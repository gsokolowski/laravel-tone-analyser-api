<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // http://127.0.0.1:8000/api/users
    public function index() {

        // Display list of skus with attached comments
        $users = User::get(['id', 'name', 'email']);

        return response()->json([
            'comments' => $users
        ],200);

    }

    public function store(Request $request) {

        $user = new User();

        // how to do validation for rest api's
        if($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            $user->save();
            return response()->json('User created',201);
        } else {
            return response()->json('Forbidden Problem with creating user',403);
        }
    }
}
