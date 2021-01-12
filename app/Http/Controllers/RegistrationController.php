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
        $validated = $request->validate([
          'user_name' => 'required|max:255',
          'user_password' => 'required|max:255',
          'user_email' => 'required|max:255|unique:App\Models\User,email',
        ]);
        $user = new User;
        $user->name = $request->user_name;
        $user->password = $request->user_password;
        $user->email = $request->user_email;

        $user->save();
        return response()->json($user->id);
    }
}
