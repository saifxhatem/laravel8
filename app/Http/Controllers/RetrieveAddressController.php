<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\User;

use Exception;
class RetrieveAddressController extends Controller

{
    public function index()
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
        $user_object = User::find($request->user_id); //this query is correct

        //$address_object = Addresses::where('user_id', $user_object->id)->pluck('address');
        $address_object = Addresses::where('user_id', $user_object->id)->get();


        return view('display_addresses', ['addresses' => $address_object]);

    }
}
