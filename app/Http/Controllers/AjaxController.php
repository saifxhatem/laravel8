<?php

namespace App\Http\Controllers;
use App\Models\Addresses;
use App\Models\Area;
use Illuminate\Http\Request;
use Log;

class AjaxController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequest()
    {
        $addresses = Addresses::all();
        $areas = Area::all();//->pluck('id', 'name');
        return view('ajaxRequest', compact('addresses', 'areas'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequestPost(Request $request)
    {
        $input = $request->all();

        Log::info($input);
        $addresses = Addresses::where('id', $request->address_id)->first();
        $areas = Area::all()->pluck('id', 'name');
        $current_area = Area::where('id', $addresses->area_id)->first();
        //return response(['current_area' => $current_area, 'address' => $addresses]);
        return response(compact('current_area', 'addresses', 'areas'));
        //return response($current_area);
        //return response()->json(['success'=>'Got Simple Ajax Request.']);

    }

    public function ajaxRequestPost_2(Request $request)
    {

      $updated_address = Addresses::where('id', $request->address_id)->first();
      $updated_address->address = $request->address;
      $updated_address->area_id = $request->area_id;
      $updated_address->update();
      return response(compact('updated_address'));

      //return response()->json(['success'=>'Got Simple Ajax Request.']);


    }


}
