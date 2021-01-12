<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\Area;
use App\Models\Governorate;
use Illuminate\Support\Facades\DB;


use Exception;
class TopGovController extends Controller

{
    public function list_top_gov()
    {
      $governorates = Governorate::withCount('addresses')->orderByDesc('addresses_count')->take(3)->get();
      return view('top_gov', compact('governorates'));
    }
    public function list_all_govs()
    {
      $governorates = Governorate::all();
      return $governorates;
    }
    public function list_all_govs_paginated()
    {
      $governorates = Governorate::Paginate(5);
      return $governorates;
    }
    public function get_areas_in_gov(Request $request, $id){
      $areas = Area::where('governorate_id', $id)->get();
      return $areas;
    }
    public function insert_new_gov(Request $request){
      $validated = $request->validate([
        'governorate_name' => 'required|max:255',
      ]);
      
      try {
        $new_gov = new Governorate;
        $new_gov->name = $request->governorate_name;
        $new_gov->save();
        return response("All good!", 200);
      }
      catch (\Exception $exception) {
        return response()->json($exception);
      }
        
      
    }

}
