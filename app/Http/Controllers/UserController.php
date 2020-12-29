<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\User;

use Exception;
class UserController extends Controller

{
    public function index() {
      return view('display_users_no_dd');

    }

    public function get_users()
    {
      $users = User::all();
      //return view('display_users_no_dd', compact('users'));
      return $users;

    }

}
