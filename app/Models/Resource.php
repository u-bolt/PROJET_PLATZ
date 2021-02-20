<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    /**
     * Getter de la catégorie à laquelle appartient
     * cette ressource
     */
    public function categorie() {
        return $this->belongsTo('App\Models\Categorie');
    }

    /**
     * Getter du user à qui appartient cette ressource
     */
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Getter des commentaires de la ressource
     */
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
}
