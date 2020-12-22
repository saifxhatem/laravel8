<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\User;


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
        //validate our input
        $validated = $request->validate(['address' => 'required||max:255', 'user_id' => 'required|numeric|exists:App\Models\User,id', ]);
        //validation complete; exec query
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
        //validate our input
        //return response($request, 200);
        $validated = $request->validate([
          'user_id' => 'required|exists:App\Models\User,id',
        ]);
        //validation complete; exec query

        $address_object = Addresses::where('user_id', $request->user_id)->get();


        return view('display_addresses', ['addresses' => $address_object]);

    }


}
