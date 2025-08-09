<?php
namespace App\Controllers;

use App\Providers\View;
use App\Providers\Auth;
use App\Providers\Validator;
use App\Models\Member;

class AuthController{ 
    public function index(){
        return View::render('auth/index');
    }
    public function store($data){
        Auth::session();
        $validator = new Validator;
        $validator->field('username', $data['username'])->min(5)->max(45)->email();
        $validator->field('password', $data['password'])->min(6)->max(20);
         if($validator->isSuccess()){
            
            $member = new Member;  
            $checkMember= $member->checkMember($data['username'], $data['password']);
            if($checkMember){
                return View::redirect('member/show?id='.$_SESSION['id']);                
            }else{ 
                $errors['message'] = "Svp, vérifie tes identifiants !";               
                return View::render('auth/index', ['errors'=>$errors]);
            }
        }else{
            $errors = $validator->getErrors();
            return View::render('auth/index', ['errors'=>$errors]);
        }
    }    
    public function delete(){
        session_destroy();
        return View::redirect('login');
    }
}

?>