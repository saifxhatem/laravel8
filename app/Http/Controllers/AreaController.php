<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\Area;
use App\Models\Governorate;
use Illuminate\Support\Facades\DB;


use Exception;
class AreaController extends Controller

{
    public function add_area(Request $request)
    {
      $validated = $request->validate([
        'area_name' => 'required|max:255',
        'governorate_id' => 'required|max:255|exists:App\Models\Governorate,id',
      ]);
      $area = new Area;
      $area->name = $request->area_name;
      $area->governorate_id = $request->governorate_id;
      $area->save();
      return response("All good!", 200);
    }
        
      
    

}
