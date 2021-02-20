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
}
