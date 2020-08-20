<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function add_user(Request $request){
        $user = new User;
        $user->create_user($request);
        if(!$user->save()){
            return response()->json([
                'message' => 'Usuario no pudo ser creado.'
            ], 409);
        }
        return response()->json([
            'message' => 'Usuario creado.'
        ], 201);
    }
}