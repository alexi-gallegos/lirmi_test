<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        $user = new User;
        $users = $user->users_paginated();
        return response()->json($users);
    }

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

    public function delete(Request $request){
        $user = new User;
        $user = $user->get_user($request->id_user);
        if($user == null){
            return response()->json([
                'message' => 'Usuario no se encuentra en los registros'
            ], 404);
        }
        $user->delete();
        return response()->json([
            'message' => 'Usuario eliminado correctamente.'
        ]);
    }
}