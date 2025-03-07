<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ppe;
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
        // Fetch all vouchers from the database
        $ppes = Ppe::all();

        // Pass the vouchers to the view
        return view('inventory.ppe', ['ppes' => $ppes]);
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
        $ppe->status = $request->condition;
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
            ->get()
            ->map(function ($ppe) {
                return [
                    'division' => $ppe->division,
                    'user' => $ppe->user,
                    'property_type' => $ppe->property_type,
                    'article_item' => $ppe->article_item,
                    'description' => $ppe->description,
                    'new_pn' => $ppe->new_pn,
                    'unit_value' => $ppe->unit_value,
                    'quantity_property' => $ppe->quantity_property,
                    'quantity_physical' => $ppe->quantity_physical,
                    'condition' => $ppe->condition,
                    'status' => $ppe->status,
                    'id' => $ppe->id,
                ];
            });
    
        return response()->json($ppes);
    }
    


}
