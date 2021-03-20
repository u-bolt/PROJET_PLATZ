<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class SearchController extends Controller
{   
    /**
     * Fonction de recherche sur plusieurs mots
     *
     * @param Request $request
     * @return array $resources
     */
    public function search(Request $request) {
        $searchValues = preg_split('/\s+/', $request->search, -1, PREG_SPLIT_NO_EMPTY);

        $resources = Resource::where(function ($q) use ($searchValues) {
            foreach ($searchValues as $value) {
                $q->orWhere('name', 'like', "%" . $value . "%");
            }
        })->get();
        return response()->json($resources);
    }
}
