<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\User;
use App\Models\Area;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Exception;
class AddressesController extends Controller

{
    public function index()
    {
        return view('display_addresses');
    }
    public function router_test()
    {
        return view('display_addresses_by_id');
    }
    public function store(Request $request)
    {

        $validated = $request->validate(['address' => 'required||max:255', 'user_id' => 'required|numeric|exists:App\Models\User,id', 'area_id' => 'required|numeric|max:255']);
        $addresses = new Addresses;
        $addresses->address = $request->address;
        $addresses->user_id = $request->user_id;
        $addresses->area_id = $request->area_id;
        $addresses->save();
    }
    public function index_get()
    {
        return view('get-address');
    }
    public function fetch_address(Request $request)
    {

        $validated = $request->validate(['user_id' => 'required|exists:App\Models\User,id', ]);

        $address_object = Addresses::where('user_id', $request->user_id)
            ->get();

        return $address_object;

    }
    public function list_all_addresses()
    {
        $addresses = Addresses::Paginate(5);
        return $addresses;
    }
    public function edit_address(Request $request)
    {
        $addresses = Addresses::where('id', $request->address_id)
            ->first();
        $areas = Area::all();
        $current_area = Area::where('id', $addresses->area_id)
            ->first();
        return view('edit_address', compact('addresses', 'areas', 'current_area'));

    }
    public function update_address(Request $request)
    {
        $updated_address = Addresses::where('id', $request->address_id)
            ->first();
        $updated_address->address = $request->address;
        $updated_address->area_id = $request->area_id;
        $updated_address->update();
        return response("Address updated successfully!", 200);
    }
    public function fetch_address_by_id($id)
    {
        $address = Addresses::where('id', $id)->first();
        return $address;
    }
    public function fetch_user_addresses(Request $request, $id)
    {
        try
        {
            $user = User::findOrFail($id);
        }
        catch(ModelNotFoundException $ex)
        {
          return response("User not found", 404);
        }
        $address_object = Addresses::where('user_id', $id)->Paginate(5);
        return $address_object;
    }

}

