<?php
namespace App\Controllers;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;
use App\Models\Role;
use App\Models\User;

class UserIndexController {

    public function __construct(){
         Auth::session();
         Auth::role(2);
     }

public function index(){
        $user = new User;
        $users = $user->select();        
        return View::render('user/index', ['users'=>$users]);
    }
}