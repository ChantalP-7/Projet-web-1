<?php
namespace App\Models;
use App\Models\CRUD;

class Member extends CRUD {
    protected $table = "membre";
    protected $primaryKey = "id";
    protected $fillable = ['prenom', 'nom', 'username', 'telephone', 'courriel', 'password'];

    public function hashPassword($password, $cost = 10){
        $options = [
                'cost' => $cost
        ];

        return password_hash($password, PASSWORD_BCRYPT, $options); 
    }

    public function checkMember($username, $password){
        $member = $this->unique('username',$username);
        if($member){
            if(password_verify($password, $member['password'])){
                session_regenerate_id();
                $_SESSION['id'] = $member['id'];
                $_SESSION['prenom'] = $member['prenom'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']);
                return true;
            }else{
                return false; 
            }
        }else{                
            return false;
        }
    }

} 
