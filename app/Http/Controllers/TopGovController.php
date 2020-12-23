<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\Area;
use App\Models\Governorate;
use Illuminate\Support\Facades\DB;


use Exception;
class TopGovController extends Controller

{
    public function index()
    {
      $governorates = Governorate::withCount('addresses')->orderByDesc('addresses_count')->take(3)->get();
      return view('top_gov', compact('governorates'));
    }

}
