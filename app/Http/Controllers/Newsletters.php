<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class Newsletters extends Controller
{
    /**
     * Ajout dans la table newsletter
     *
     * @return void
     */
    public function store(Request $request) {
        $newsletter = new Newsletter;
        $newsletter->email = $request->email;
        $newsletter->created_at = now();
        $newsletter->save();
    }
}
