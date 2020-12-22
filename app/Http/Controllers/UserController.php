<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\User;

use Exception;
class UserController extends Controller

{
    public function index()
    {
      $users = User::all();
      return view('display_users', compact('users'));
    }

}
