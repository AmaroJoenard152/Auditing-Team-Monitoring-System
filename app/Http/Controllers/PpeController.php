<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ppe;
use App\Models\PpeHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;

class PpeController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'division'          => 'required|string',
            'user'              => 'required|string',
            'property_type'     => 'required|string',
            'article_item'      => 'required|string',
            'description'       => 'required|string',
            'old_pn'            => 'required|string',
            'new_pn'            => 'required|string',
            'unit_meas'         => 'required|string',
            'unit_value'        => 'required|numeric',
            'quantity_property' => 'required|integer',
            'quantity_physical' => 'required|integer',
            'location'          => 'required|string',
            'condition'         => 'required|string',
            'status'            => 'required|string',
            'remarks'           => 'nullable|string',
            'date_acq'          => 'required|date',
        ]);

        // Create PPE entry
        $ppe = Ppe::create($validatedData);

        return response()->json([
            'message' => 'PPE record created successfully!',
            'ppe' => $ppe
        ], 201);
    } 

    public function showPpe()
    {
        $ppes = Ppe::all();
        $editHistory = PpeHistory::orderBy('edited_at', 'desc')->get();
    
        return view('inventory.ppe', compact('ppes', 'editHistory'));
    }
    
    public function deletePpe($id)
    {
        $ppe = Ppe::find($id);

        $ppe->delete();

        return redirect()->back();
    }
    
    public function updatePpe($id)
    {
        $ppe = Ppe::find($id);

        return view('inventory/editPpe', compact('ppe'));
    }

    public function savePpe(Request $request, $id = null)
    {
        if ($id) {
            // Update existing voucher
            $ppe = Ppe::find($id);
        } else {
            // Create a new voucher
            $ppe = new Ppe();
        }
    
        $ppe->division = $request->division;
        $ppe->user = $request->user;
        $ppe->property_type = $request->property_type;
        $ppe->article_item = $request->article_item;
        $ppe->description = $request->description;
        $ppe->old_pn = $request->old_pn;
        $ppe->new_pn = $request->new_pn;
        $ppe->unit_meas = $request->unit_meas;
        $ppe->unit_value = $request->unit_value;
        $ppe->quantity_property = $request->quantity_property;
        $ppe->quantity_physical = $request->quantity_physical;
        $ppe->location = $request->location;
        $ppe->condition = $request->condition;
        $ppe->status = $request->status;
        $ppe->remarks = $request->remarks;
        $ppe->date_acq = $request->date_acq;
        
        $ppe->save();
    
        return redirect('/ppe');
    }

    public function searchPpe(Request $request)
    {
        $searchValue = $request->input('search_ppe');

        // Split the search query into individual keywords
        $keywords = preg_split('/\s+/', $searchValue, -1, PREG_SPLIT_NO_EMPTY);

        // Start building the query
        $query = Ppe::query();

        // For each keyword, add a sub-query that checks multiple columns
        foreach ($keywords as $keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('division', 'LIKE', "%{$keyword}%")
                ->orWhere('user', 'LIKE', "%{$keyword}%")
                ->orWhere('property_type', 'LIKE', "%{$keyword}%")
                ->orWhere('article_item', 'LIKE', "%{$keyword}%")
                ->orWhere('description', 'LIKE', "%{$keyword}%")
                ->orWhere('new_pn', 'LIKE', "%{$keyword}%")
                ->orWhere('unit_value', 'LIKE', "%{$keyword}%")
                ->orWhere('quantity_property', 'LIKE', "%{$keyword}%")
                ->orWhere('quantity_physical', 'LIKE', "%{$keyword}%")
                ->orWhere('condition', 'LIKE', "%{$keyword}%")
                ->orWhere('status', 'LIKE', "%{$keyword}%")
                ->orWhere('old_pn', 'LIKE', "%{$keyword}%")
                ->orWhere('unit_meas', 'LIKE', "%{$keyword}%")
                ->orWhere('remarks', 'LIKE', "%{$keyword}%")
                ->orWhere('date_acq', 'LIKE', "%{$keyword}%")
                ->orWhere('created_at', 'LIKE', "%{$keyword}%")
                ->orWhere('updated_at', 'LIKE', "%{$keyword}%");
            });
        }

        // Execute the query and format the result
        $ppes = $query->get()->map(function ($ppe) {
            return [
                'id' => $ppe->id,
                'division' => $ppe->division,
                'user' => $ppe->user,
                'property_type' => $ppe->property_type,
                'article_item' => $ppe->article_item,
                'description' => $ppe->description,
                'old_pn' => $ppe->old_pn,
                'new_pn' => $ppe->new_pn,
                'unit_meas' => $ppe->unit_meas,
                'unit_value' => $ppe->unit_value,
                'quantity_property' => $ppe->quantity_property,
                'quantity_physical' => $ppe->quantity_physical,
                'location' => $ppe->location,
                'condition' => $ppe->condition,
                'status' => $ppe->status,
                'remarks' => $ppe->remarks,
                'date_acq' => $ppe->date_acq,
                'created_at' => $ppe->created_at,
                'updated_at' => $ppe->updated_at,
            ];
        });

        return response()->json($ppes);
    }

    public function dvExportCSV(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $division = $request->input('division');
        $propertyType = $request->input('property_type');
        $condition = $request->input('condition');
        $status = $request->input('status');
    
        // Build the query with filters
        $query = DB::table('ppes');
    
        if ($startDate && $endDate) {
            $query->whereBetween('date_acq', [$startDate, $endDate]);
        }
    
        if ($division && $division !== '--All Divisions--') {
            $query->where('division', $division);
        }
    
        if ($propertyType) {
            $query->where('property_type', $propertyType);
        }
    
        if ($condition) {
            $query->where('condition', $condition);
        }
    
        if ($status) {
            $query->where('status', $status);
        }
    
        $data = $query->get();
        $totalAmount = $data->sum('unit_value'); // Compute total amount
    
        $filename = 'PPE_Data_' . date('Ymd') . '.csv';
    
        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=' . $filename,
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];
    
        $callback = function() use ($data, $totalAmount) {
            $file = fopen('php://output', 'w');
    
            // CSV Headers
            fputcsv($file, [
                'No.', 'Division', 'User', 'Property Type', 'Article/Item', 'Description',
                'Old PN', 'New PN', 'Unit Measure', 'Unit Value', 'Quantity Property',
                'Quantity Physical', 'Location', 'Condition', 'Status', 'Remarks',
                'Date Acquired', 'Created At', 'Updated At'
            ]);
    
            // Data rows with automated numbering
            $counter = 1;
            foreach ($data as $row) {
                fputcsv($file, [
                    $counter++,
                    $row->division,
                    $row->user,
                    $row->property_type,
                    $row->article_item,
                    $row->description,
                    $row->old_pn,
                    $row->new_pn,
                    $row->unit_meas,
                    number_format($row->unit_value, 2, '.', ','), // Format unit_value
                    $row->quantity_property,
                    $row->quantity_physical,
                    $row->location,
                    $row->condition,
                    $row->status,
                    $row->remarks,
                    $row->date_acq,
                    $row->created_at,
                    $row->updated_at
                ]);
            }
    
            // Blank row before total
            fputcsv($file, []);
    
            // Total row
            fputcsv($file, [
                '', '', '', '', '', '', '', '', 'Total',
                number_format($totalAmount, 2, '.', ','), '', '', '', '', '', '', '', '', ''
            ]);
    
            fclose($file);
        };
    
        return Response::stream($callback, 200, $headers);
    }

    public function getDivisionCount()
    {
        $data = DB::table('ppes')
            ->select('division', DB::raw('COUNT(*) as count'))
            ->groupBy('division')
            ->get();

        return response()->json($data);
    }

    public function getYearCount()
    {
        $data = DB::table('ppes')
            ->select(DB::raw('YEAR(date_acq) as year'), DB::raw('COUNT(*) as count'))
            ->whereNotNull('date_acq') // Ensure only valid dates are considered
            ->groupBy(DB::raw('YEAR(date_acq)'))
            ->orderBy('year')
            ->get();

        return response()->json($data);
    }


}
