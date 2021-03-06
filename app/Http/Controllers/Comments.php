<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class Comments extends Controller
{
    /**
     * Renvoi de tous les comments au format JSON
     *
     * @return json
     */
    public function index() {
        return response()->json(Comment::all());
    }
}
