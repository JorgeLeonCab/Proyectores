<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    // public function setAdmin(){
    //     $auth = Auth::user();
        
    //     // if($password == '12345'){
    //         $user = User::select( 'users.*', 'model_has_roles.role_id', 'roles.name as nom_rol')
    //         ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
    //         ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
    //         ->get();
    //         $user->role_id = 3;
    //         $user->save();
    //         return Redirect::route('admin.proyectores.index');
    //     // }else{
    //     //     return "Contraseña incorrecta";
    //     // }
    // }
}
