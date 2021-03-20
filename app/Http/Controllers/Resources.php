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


    public function add(Request $request) {
        $resource = new Resource;
        $resource->name = $request->name;

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('assets/img'), $imageName);
    
            $resource->image = $imageName;
        }
        else {
            $resource->image = 'font-1.jpg';
        }
    
        $resource->weight = '29.02';
        $resource->description = $request->description;
        $resource->categorie_id = $request->categorie;
        $resource->user_id = $request->user;
        $resource->save();
        return response()->json([
            'status' => 200,
            'message' => 'Ok'
        ]);
    }


    public function edit(Request $request) {
        $resource = Resource::find($request->id);
        $resource->name = $request->name;

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('assets/img'), $imageName);
    
            $resource->image = $imageName;
        }

        $resource->description = $request->description;
        $resource->categorie_id = $request->categorie;
        $resource->user_id = $request->user;
        $resource->updated_at = NOW();
        $resource->save();
        return response()->json([
            'status' => 200,
            'message' => 'Ok'
        ]);
    }


    public function delete(Request $request) {
        $resource = Resource::find($request->id);
        $resource->delete();
    }
}
