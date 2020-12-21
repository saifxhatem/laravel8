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
}
