<?php
namespace App\Controllers;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;
use App\Models\Role;
use App\Models\User;

class UserController {

   public function __construct(){
        Auth::session();
        Auth::role(1);
    }

    public function create(){
            $role = new Role;
            $roles = $role->select(); 
            return View::render('user/create', ['roles' => $roles]);
    } 

    public function index(){
            $user = new Role;
            $users = $user->select(); 
            return View::render(['users' => $users]);
    }     

    public function store($data){

        $validator = new Validator;
        $validator->field('prenom', $data['prenom'])->min(2)->max(45);
        $validator->field('nom', $data['nom'])->min(2)->max(45);
        $validator->field('username', $data['username'])->min(2)->max(50)->email()->unique('User');
        $validator->field('password', $data['password'])->min(6)->max(20);
        $validator->field('courriel', $data['courriel'])->min(2)->max(50)->email();
        $validator->field('idRole', $data['idRole'], 'Role')->required();

        if($validator->isSuccess()){
            $user = new User;
            $data['password'] =  $user->hashPassword($data['password']);
            $insert = $user->insert($data);
            return View::redirect('login');
        }else{
            $errors = $validator->getErrors();
            $role = new Role;
            $roles = $role->select();
            return View::render('user/create', ['errors'=>$errors, 'user'=>$data,'roles' => $roles]);
        }

    }

    public function delete($data){
        Auth::session();
        $user = new User;
        $delete = $user->delete($data['id']);
        if($delete){
            return View::redirect('users');
        }else{
            return View::render('error', ['message'=>'404 page introuvable !']);
        }
    }

    
}
?>