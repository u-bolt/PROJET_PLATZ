<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Users extends Controller
{
    /**
     * Renvoi de tous les users au format JSON
     *
     * @return json
     */
    public function index() {
        return response()->json(User::all());
    }
}
