<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $resources = Resource::where('name', 'like', '%' . $request->search . '%')->get();
        return $resources;
    }
}
