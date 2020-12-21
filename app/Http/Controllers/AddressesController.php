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
        //verifying that input is correct
        if (empty($request->address))
        {
          return redirect('addresses')
              ->with('status', 'Address cannot be empty');
        }
        if (empty($request->user_id))
        {
          return redirect('addresses')
              ->with('status', 'User_ID cannot be empty or 0');
        }
        if (!is_int($request->user_id))
        {
          return redirect('addresses')
              ->with('status', 'User_ID must be a number');
        }

        // verifying that user exists in the database
        $user = new User;
        if (User::where('id', $request->user_id)
            ->first())
        {
            $addresses = new Addresses;
            $addresses->address = $request->address;
            $addresses->user_id = $request->user_id;
            $addresses->save();
            return redirect('addresses')
                ->with('status', 'Insertion Successful');
        }
        else
        {
            return redirect('addresses')
                ->with('status', 'Query Failed: User ID does not exist.');
        }
    }
}
