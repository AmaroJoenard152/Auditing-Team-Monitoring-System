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
    
    
}
