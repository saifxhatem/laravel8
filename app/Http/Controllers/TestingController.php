<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\User;

use Exception;
class TestingController extends Controller

{
    public function index()
    {
        return view('modal_test');
    }
    public function check_post(Request $request)
    {
        return response($request, 200);
    }

}
