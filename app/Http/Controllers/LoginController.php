<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


use Exception;
class LoginController extends Controller

{
    
    public function auth_login(Request $request)
    {
        // $validator = Validator::make($request->all(),
        // [
        //   'user_password' => 'required|max:255',
        //   'user_email' => 'required|max:255',
        // ]);

        $validator = $request->validate([
          'user_password' => 'required|max:255',
          'user_email' => 'required|max:255',
        ]);

        
        $user = User::where('email', $request->user_email)
        ->where('password', $request->user_password)
        ->first();
        
        if (!isset($user)) {
          return response("User not found", 205);
        }

        
        
        return response()->json($user->id);
    }
}
