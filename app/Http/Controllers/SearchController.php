<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $countries = Country::where('name', 'like', '%' . $query . '%')->get();

        return response()->json($countries);
    }
}
