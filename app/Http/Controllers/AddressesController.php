<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\User;

use Exception;
class AddressesController extends Controller

{
    public function index_insert()
    {
        return view('addresses');
    }
    public function store(Request $request)
    {
        //validate our input
        $validated = $request->validate(['address' => 'required||max:255', 'user_id' => 'required|numeric|exists:App\Models\User,id', ]);
        //validation complete; exec query
        $addresses = new Addresses;
        $addresses->address = $request->address;
        $addresses->user_id = $request->user_id;
        $addresses->save();
        return redirect('addresses')
            ->with('status', 'Insertion Successful');
    }

    //today's changes

    public function index_get()
    {
        return view('get-address');
    }
    public function get_address(Request $request)
    {
        //validate our input
        $validated = $request->validate([
          'user_id' => 'required|exists:App\Models\User,id',
        ]);
        //validation complete; exec query
        //$user_object = User::find($request->user_id); //this query is correct

        //$address_object = Addresses::where('user_id', $user_object->id)->pluck('address');
        $address_object = Addresses::where('user_id', $request->user_id)->get();


        return view('display_addresses', ['addresses' => $address_object]);

    }
}
