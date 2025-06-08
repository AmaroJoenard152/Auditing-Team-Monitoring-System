<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReconcilerController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file1' => 'required|file|mimes:csv,txt',
            'file2' => 'required|file|mimes:csv,txt',
        ]);

        // Read file contents as string
        $file1Content = file_get_contents($request->file('file1')->getRealPath());
        $file2Content = file_get_contents($request->file('file2')->getRealPath());

        // Extract headers for user to choose column key
        $columns1 = $this->extractCsvHeadersFromString($file1Content);
        $columns2 = $this->extractCsvHeadersFromString($file2Content);

        session([
            'columns1' => $columns1,
            'columns2' => $columns2,
            'file1_data' => $file1Content,
            'file2_data' => $file2Content,
        ]);

        return back()->withInput();
    }

    private function extractCsvHeadersFromString($content)
    {
        $lines = explode("\n", $content);
        return str_getcsv(trim($lines[0]));
    }

    public function reconcile(Request $request)
    {
        $selectedColumn = trim($request->input('column1'));  
        $compareColumn = trim($request->input('column2'));   

        // Load files from session
        $file1Content = session('file1_data');
        $file2Content = session('file2_data');

        if (!$file1Content || !$file2Content) {
            return back()->with('error', 'File data not found. Please re-upload the files.');
        }

        // Parse CSV data
        $data1 = $this->readCsvStringAsAssoc($file1Content);
        $data2 = $this->readCsvStringAsAssoc($file2Content);

        // Group rows by the selected key
        $grouped1 = collect($data1)->groupBy($selectedColumn);
        $grouped2 = collect($data2)->groupBy($selectedColumn);

        // Find common keys
        $commonKeys = array_intersect($grouped1->keys()->all(), $grouped2->keys()->all());

        $differences = [];

        $normalize = function ($value) {
            $value = (string) $value;
            $value = preg_replace('/[\s\r\n\t]+/u', ' ', $value); // replace all whitespace
            $value = preg_replace('/[\x00-\x1F\x7F]/u', '', $value); // remove non-printables
            return strtolower(trim(preg_replace('/ +/', ' ', $value))); // collapse spaces
        };

        foreach ($commonKeys as $key) {
            $rows1 = $grouped1[$key]->values()->all();
            $rows2 = $grouped2[$key]->values()->all();
            $maxRows = max(count($rows1), count($rows2));

            for ($i = 0; $i < $maxRows; $i++) {
                $row1 = $rows1[$i] ?? [];
                $row2 = $rows2[$i] ?? [];

                $val1 = $normalize($row1[$compareColumn] ?? '');
                $val2 = $normalize($row2[$compareColumn] ?? '');

                if ($val1 !== $val2) {
                    $differences[] = [
                        'key' => $key,
                        'row' => $i + 1,
                        'column' => $compareColumn,
                        'file1' => $row1[$compareColumn] ?? '',
                        'file2' => $row2[$compareColumn] ?? '',
                    ];
                }
            }
        }

        // 🔍 Compare Existing and Non-Existing Keys
        $keys1 = $grouped1->keys()->all();
        $keys2 = $grouped2->keys()->all();

        $onlyInFile1 = array_diff($keys1, $keys2);
        $onlyInFile2 = array_diff($keys2, $keys1);

        $nonExisting = [];

        foreach ($onlyInFile1 as $key) {
            $row = $grouped1[$key]->first();
            $nonExisting[] = [
                'key' => $key,
                'file1' => $row[$compareColumn] ?? '',
                'file2' => 'Does Not Exist in Dataset 2',
            ];
        }

        foreach ($onlyInFile2 as $key) {
            $row = $grouped2[$key]->first();
            $nonExisting[] = [
                'key' => $key,
                'file1' => 'Does Not Exist in Dataset 1',
                'file2' => $row[$compareColumn] ?? '',
            ];
        }

        // ✅ Final result
        return redirect()->back()->with([
            'differences' => $differences,
            'selectedColumn' => $selectedColumn,
            'compareColumn' => $compareColumn,
            'nonExisting' => $nonExisting,
        ]);
    }



    public function index()
    {
        // Show the form
        session()->forget(['differences', 'selectedColumn', 'compareColumn']);
        return view('reconciler.reconciler');
    }



    private function preprocessArray(array $arr): array {
        return array_map(function($item) {
            $str = (string) $item;
            $str = trim($str);
            $str = preg_replace('/[\x00-\x1F\x7F]/u', '', $str);
            return $str;
        }, $arr);
    }

    private function readCsvStringAsAssoc($csvContent)
    {
        $rows = [];
        $lines = explode(PHP_EOL, trim($csvContent));
        $rawHeaders = str_getcsv(array_shift($lines));

        // Preprocess header
        $headers = $this->preprocessArray($rawHeaders);

        foreach ($lines as $line) {
            if (trim($line) === '') continue;

            $data = str_getcsv($line);

            // Preprocess row data
            $cleanData = $this->preprocessArray($data);

            // Normalize length if necessary
            $cleanData = array_slice($cleanData, 0, count($headers));
            $cleanData = array_pad($cleanData, count($headers), null);

            if (count($cleanData) === count($headers)) {
                $rows[] = array_combine($headers, $cleanData);
            }
        }

        return $rows;
    }
}
