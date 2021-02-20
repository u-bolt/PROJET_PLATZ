<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class Categories extends Controller
{   
    /**
     * Renvoi de de toute les catégories au format JSON
     *
     * @return json
     */
    public function index() {
        return response()->json(Categorie::all());
    }
}
