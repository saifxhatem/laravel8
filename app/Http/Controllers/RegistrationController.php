<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\User;

use Exception;
class RegistrationController extends Controller

{
    public function index()
    {
        return view('registration');
    }
    public function store(Request $request)
    {
        //validate our input
        $validated = $request->validate([
          'name' => 'required|max:255',
          'password' => 'required|max:255',
          'email' => 'required|max:255|unique:App\Models\User,email',
        ]);
        //validation complete; exec query
        $user = new User;
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;

        $user->save();
        return redirect('registration')
            ->with('status', 'Registration Successful');
    }
}
