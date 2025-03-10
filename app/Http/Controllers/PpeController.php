<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ppe;
use App\Models\PpeHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class PpeController extends Controller
{
    public function submitPpe(Request $request)
    {
        // Create a new property
        $ppe = new Ppe();
        $ppe->division = $request->input('division');
        $ppe->user = $request->input('user');
        $ppe->property_type = $request->input('property_type');
        $ppe->article_item = $request->input('article_item');
        $ppe->description = $request->input('description');
        $ppe->old_pn = $request->input('old_pn');
        $ppe->new_pn = $request->input('new_pn');
        $ppe->unit_meas = $request->input('unit_meas');
        $ppe->unit_value = $request->input('unit_value');
        $ppe->quantity_property = $request->input('quantity_property');
        $ppe->quantity_physical = $request->input('quantity_physical');
        $ppe->location = $request->input('location');
        $ppe->condition = $request->input('condition');
        $ppe->status = $request->input('status');
        $ppe->remarks = $request->input('remarks');
        $ppe->date_acq = $request->input('date_acq');
        $ppe->save();

        // Redirect back
        return redirect()->back();
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
    
        // Retrieve the PPE records based on the search criteria
        $ppes = Ppe::where('division', 'LIKE', "%$searchValue%")
            ->orWhere('user', 'LIKE', "%$searchValue%")
            ->orWhere('property_type', 'LIKE', "%$searchValue%")
            ->orWhere('article_item', 'LIKE', "%$searchValue%")
            ->orWhere('description', 'LIKE', "%$searchValue%")
            ->orWhere('new_pn', 'LIKE', "%$searchValue%")
            ->orWhere('unit_value', 'LIKE', "%$searchValue%")
            ->orWhere('quantity_property', 'LIKE', "%$searchValue%")
            ->orWhere('quantity_physical', 'LIKE', "%$searchValue%")
            ->orWhere('condition', 'LIKE', "%$searchValue%")
            ->orWhere('status', 'LIKE', "%$searchValue%")
            ->orWhere('old_pn', 'LIKE', "%$searchValue%")
            ->orWhere('unit_meas', 'LIKE', "%$searchValue%")
            ->orWhere('remarks', 'LIKE', "%$searchValue%")
            ->orWhere('date_acq', 'LIKE', "%$searchValue%")
            ->orWhere('created_at', 'LIKE', "%$searchValue%")
            ->orWhere('updated_at', 'LIKE', "%$searchValue%")
            ->get()
            ->map(function ($ppe) {
                return [
                    'id' => $ppe->id,
                    'division' => $ppe->division,
                    'user' => $ppe->user,
                    'property_type' => $ppe->property_type,
                    'article_item' => $ppe->article_item,
                    'description' => $ppe->description,
                    'old_pn' => $ppe->old_pn,  // Added
                    'new_pn' => $ppe->new_pn,
                    'unit_meas' => $ppe->unit_meas, // Added
                    'unit_value' => $ppe->unit_value,
                    'quantity_property' => $ppe->quantity_property,
                    'quantity_physical' => $ppe->quantity_physical,
                    'location' => $ppe->location,
                    'condition' => $ppe->condition,
                    'status' => $ppe->status,
                    'remarks' => $ppe->remarks, // Added
                    'date_acq' => $ppe->date_acq, // Added
                    'created_at' => $ppe->created_at, // Added
                    'updated_at' => $ppe->updated_at, // Added
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
    
        // Query the data based on the filters
        $query = DB::table('ppes'); // Adjust to match your actual table
    
        if ($startDate && $endDate) {
            $query->whereBetween('date_received', [$startDate, $endDate]);
        }
    
        if ($division && $division !== '--All Divisions--') { // Only filter division if not "All"
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
    
        // Generate dynamic filename
        $filename = 'PPE_Data_' . date('Ymd') . '.csv';
    
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
            if (!$data->isEmpty()) {
                fputcsv($file, array_keys((array) $data[0])); // Add headers
            }
            foreach ($data as $row) {
                fputcsv($file, (array) $row); // Add data
            }
            fclose($file);
        };
    
        return Response::stream($callback, 200, $headers);
    }

    

}
