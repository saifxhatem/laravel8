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
        // validation step
        $user = new User;
        if (User::where('id', $request->user_id)->first()) {
          $addresses = new Addresses;
          $addresses->address = $request->address;
          $addresses->user_id = $request->user_id;
          $addresses->save();
          return redirect('addresses')
              ->with('status', 'Insertion Successful');
        }
        else
        {
          //return redirect('addresses')->with('status', 'Query Failed: User ID does not exist.');
          return response('This user does not exist.', 200);
        }


        /*   Code block for mysql error handling
        try
        {
          $addresses = new Addresses;
          $addresses->address = $request->address;
          $addresses->user_id = $request->user_id;
          $addresses->save();
          return redirect('addresses')->with('status', 'Insertion Successful');
        }
        catch(Exception $e)
        {
           //trying to catch err 1452
           //dd($e->getMessage());
           //echo $e;
           if($e->errorInfo[1] == 1452) {
           return redirect('addresses')->with('status', 'Query Failed: User ID does not exist. ErrCode: 1452');
        }
        }*/
    }
}
