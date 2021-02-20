<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    /**
     * Getter des resources de la catégorie
     */
    public function resources() {
        return $this->hasMany('App\Models\Resource');
    }
}
