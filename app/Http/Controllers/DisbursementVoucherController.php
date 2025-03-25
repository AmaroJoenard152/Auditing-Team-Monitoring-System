<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisbursementVoucher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DisbursementVoucherController extends Controller
{
    public function submitVoucher(Request $request)
    {
        // Create a new disbursement voucher
        $voucher = new DisbursementVoucher();
        $voucher->month_ = $request->input('month_');
        $voucher->doc_ = $request->input('doc_');
        $voucher->code_no = $request->input('code_no');
        $voucher->folder = $request->input('folder');
        $voucher->account_no = $request->input('account_no');
        $voucher->radai = $request->input('radai');
        $voucher->lddap = $request->input('lddap');
        $voucher->total_amount = $request->input('total_amount');
        $voucher->date_received = $request->input('date_received');
        $voucher->save();

        // Redirect back
        return redirect()->back();
    }

    public function showVoucher()
    {
        // Fetch all vouchers from the database
        $vouchers = DisbursementVoucher::all();

        // Pass the vouchers to the view
        return view('monitoring.disbursement-voucher', ['vouchers' => $vouchers]);
    }

    public function deleteVoucher($id)
    {
        $voucher = DisbursementVoucher::find($id);

        $voucher->delete();

        return redirect()->back();
    }

    public function updateVoucher($id)
    {
        $voucher = DisbursementVoucher::find($id);

        return view('monitoring/editVoucher', compact('voucher'));
    }

    public function saveVoucher(Request $request, $id = null)
    {
        if ($id) {
            // Update existing voucher
            $voucher = DisbursementVoucher::find($id);
        } else {
            // Create a new voucher
            $voucher = new DisbursementVoucher();
        }
    
        $voucher->month_ = $request->month_;
        $voucher->doc_ = $request->doc_;
        $voucher->code_no = $request->code_no;
        $voucher->folder = $request->folder;
        $voucher->account_no = $request->account_no;
        $voucher->radai = $request->radai;
        $voucher->lddap = $request->lddap;
        $voucher->total_amount = $request->total_amount;
        $voucher->date_received = $request->date_received;
    
        $voucher->save();
    
        return redirect('/disbursement-voucher');
    }

    public function dvDownloadCSV(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $docType = $request->input('doc');

        // Query the data based on the filters
        $query = DB::table('disbursement_vouchers'); // Your 'disbursement_vouchers' table

        if ($startDate && $endDate) {
            $query->whereBetween('date_received', [$startDate, $endDate]);
        }

        if ($docType) {
            $query->where('doc_', $docType); 
        }

        $data = $query->get();

        // If no filters are applied, retrieve all data
        if ($data->isEmpty()) {
            $data = DB::table('disbursement_vouchers')->get();
        }

        // Create dynamic filename based on input
        if ($startDate && $endDate && $docType) {
            // If both date range and docType are selected
            $formattedStartDate = date('F_j_Y', strtotime($startDate));
            $formattedEndDate = date('F_j_Y', strtotime($endDate));
            $filename = $docType . '_From_' . $formattedStartDate . '_to_' . $formattedEndDate . '.csv';
        } elseif ($docType && !$startDate && !$endDate) {
            // If only docType is selected
            $filename = 'All_' . $docType . '_Data.csv';
        } elseif ($startDate && $endDate && !$docType) {
            // If only date range is selected
            $formattedStartDate = date('F_j_Y', strtotime($startDate));
            $formattedEndDate = date('F_j_Y', strtotime($endDate));
            $filename = 'Data_From_' . $formattedStartDate . '_to_' . $formattedEndDate . '.csv';
        } elseif (!$startDate && !$endDate && !$docType) {
            // If neither date range nor docType is selected
            $oldestYear = DB::table('disbursement_vouchers')->min(DB::raw('YEAR(date_received)'));
            $mostRecentYear = DB::table('disbursement_vouchers')->max(DB::raw('YEAR(date_received)'));
            $filename = 'All_Data_From_' . $mostRecentYear . '_to_' . $oldestYear . '.csv';
        } else {
            // Default filename for all other cases
            $filename = 'all_data_' . date('Ymd') . '.csv';
        }

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=' . $filename,
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        // Prepare the CSV for download
        $callback = function() use ($data) {
            $file = fopen('php://output', 'w');
            if (!empty($data)) {
                fputcsv($file, array_keys((array) $data[0])); // Add headers
            }
            foreach ($data as $row) {
                fputcsv($file, (array) $row); // Add data
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function searchVoucher(Request $request)
    {
        $searchValue = $request->input('search_voucher');
    
        // Retrieve the vouchers based on the search criteria
        $vouchers = DisbursementVoucher::where('code_no', 'LIKE', "%$searchValue%")
            ->orWhere('folder', 'LIKE', "%$searchValue%")
            ->orWhere('account_no', 'LIKE', "%$searchValue%")
            ->orWhere('radai', 'LIKE', "%$searchValue%")
            ->orWhere('lddap', 'LIKE', "%$searchValue%")
            ->orWhere('total_amount', 'LIKE', "%$searchValue%")
            ->get()
            ->map(function ($voucher) {
                return [
                    'month_' => $voucher->month_,
                    'doc_' => $voucher->doc_,
                    'code_no' => $voucher->code_no,
                    'folder' => $voucher->folder,
                    'account_no' => $voucher->account_no === 'N/A' ? null : $voucher->account_no,
                    'radai' => $voucher->radai === 'N/A' ? null : $voucher->radai,
                    'lddap' => $voucher->lddap === 'N/A' ? null : $voucher->lddap,
                    'total_amount' => $voucher->total_amount === 'N/A' ? null : $voucher->total_amount,
                    'date_received' => $voucher->date_received,
                    'id' => $voucher->id,
                ];
            });
    
        return response()->json($vouchers);
    }
    
    
    

}
