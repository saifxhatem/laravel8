<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\User;

use Exception;
class UserController extends Controller

{
    public function index() {
      return view('display_users');

    }

    public function get_users()
    {
      $users = User::all();
      return $users;

    }

}
