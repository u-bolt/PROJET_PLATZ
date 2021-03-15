<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;

class Resources extends Controller
{   
    /**
     * Renvoi de de toute les ressources au format JSON
     *
     * @return json
     */
    public function index() {
        return response()->json(Resource::all());
    }


    public function add(Request $request) {
        $resource = new Resource;
        $resource->name = $request->name;
        $resource->description = $request->description;
        $resource->categorie_id = $request->categorie;
        $resource->user_id = $request->user;
        $resource->save();
        return response()->json([
            'status' => 200,
            'message' => 'Ok'
        ]);
    }
}
