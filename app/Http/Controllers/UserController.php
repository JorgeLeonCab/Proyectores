<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function putAdmin($password){
        if($password == '123456789'){
            $usuario_log = Auth::user();
            $user = User::find($usuario_log->id);
            $user->role_id = 3;
            $user->save();
            return 'success';
        }else{
            return "error";
        }
    }
}
