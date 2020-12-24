<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\User;
use App\Models\Area;


use Exception;
class AddressesController extends Controller

{
    public function index()
    {
        $users = User::all();
        return view('insert_addresses', compact('users'));
    }
    public function store(Request $request)
    {

        $validated = $request->validate(['address' => 'required||max:255', 'user_id' => 'required|numeric|exists:App\Models\User,id', ]);

        $addresses = new Addresses;
        $addresses->address = $request->address;
        $addresses->user_id = $request->user_id;
        $addresses->save();
        return redirect('insert-addresses')
            ->with('status', 'Insertion Successful');
    }
    public function index_get()
    {
        return view('get-address');
    }
    public function fetch_address(Request $request)
    {

        $validated = $request->validate([
          'user_id' => 'required|exists:App\Models\User,id',
        ]);


        $address_object = Addresses::where('user_id', $request->user_id)->get();


        return view('display_addresses', ['addresses' => $address_object]);

    }
   public function list_all_addresses()
   {
     $addresses = Addresses::all();
     return view ('display_addresses_dropdown', compact('addresses'));
   }
   public function edit_address(Request $request)
   {
     $addresses = Addresses::where('id', $request->address_id)->first();
     $areas = Area::all();
     $current_area = Area::where('id', $addresses->area_id)->first();
     //return response($current_area);
     return view('edit_address', compact('addresses', 'areas', 'current_area'));

   }
   public function update_address(Request $request)
   {
     $updated_address = Addresses::where('id', $request->address_id)->first();
     $updated_address->address = $request->address;
     $updated_address->area_id = $request->area_id;
     $updated_address->update();
     return response("Address updated successfully!", 200);
   }

}
