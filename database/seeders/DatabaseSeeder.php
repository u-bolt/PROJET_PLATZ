<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resource;
use App\Models\User;
use App\Models\Comment;
use App\Models\Categorie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $nbUsers      = 3;
        $nbCategories = 5;
        $nbComments   = 10;
        $nbResources  = 60;

        User::factory($nbUsers)->create();
        Categorie::factory($nbCategories)->create();
        $comments  = Comment::factory($nbComments)->create();
        $resources = Resource::factory($nbResources)->create();

        $comments->each(function($c) {
            $c->update(['user_id' => User::all()->random()->id, 'resource_id' => Resource::all()->random()->id]);
        });
        $resources->each(function($r) {
            $r->update(['categorie_id' => Categorie::all()->random()->id, 'user_id' => User::all()->random()->id]);
        });
        
    }
}
