<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Autocomplete;

class AutocompleteController extends Controller
{
    function index()
    {
        $filter_data = Autocomplete::select('name')
                        ->distinct('name')
                        ->get();
        return $filter_data; exit();
        return view('typeahead_autocomplete');
    }

    function action(Request $request)
    {
        $data = $request->all();

        $query = $data['query'];

        $filter_data = Autocomplete::select('id','name')
                        ->where('name', 'LIKE', '%'.$query.'%')
                        ->get();

        return response()->json($filter_data);
    }
}
