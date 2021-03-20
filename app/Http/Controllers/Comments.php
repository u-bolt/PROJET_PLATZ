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

    /**
     * Ajoute un commentaire
     *
     * @param Request $request
     * @return $comment
     */
    public function add(Request $request) {
        $comment = new Comment();
        $comment->content = $request->comment;
        $comment->user_id = $request->user;
        $comment->resource_id = $request->resource;
        $comment->updated_at = null;
        $comment->save();
        return response()->json($comment);
    }
}
