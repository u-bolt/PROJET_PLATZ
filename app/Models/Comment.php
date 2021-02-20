<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Getter du user à qui appartient le commentaire
     */
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Getter de la ressource liée à ce commentaire
     */
    public function resource() {
        return $this->belongsTo('App\Models\Resource');
    }
}
