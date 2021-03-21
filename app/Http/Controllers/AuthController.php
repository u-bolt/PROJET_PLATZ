<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'pseudo' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(['status_code' => 400, 'message' => 'Bad Request']);
        }

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->pseudo = $request->pseudo;
        $user->email = $request->email;
        $user->updated_at = null;
        $user->password = bcrypt($request->password);
        $user->save();

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Unauthorized'
            ]);
        }

        return response()->json([
            'status_code' => 200,
            'user' => $user
        ]);

    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(['status_code' => 400, 'message' => 'Bad Request']);
        }

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Unauthorized'
            ]);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'status_code' => 200,
            'user' => $user
        ]);
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'status_code' => 200,
            'message' => 'Log out successfully !'
        ]);  
    }
}
