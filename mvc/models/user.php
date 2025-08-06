<?php
namespace App\Models;
use App\Models\CRUD;

class User extends CRUD {
    protected $table = "utilisateur";
    protected $primaryKey = "id";
    protected $fillable = ['prenom', 'nom', 'nomUtilisateur', 'courriel', 'password', 'idRole', 'estActif'];

    public function hashPassword($password, $cost = 10){
        $options = [
                'cost' => $cost
        ];

        return password_hash($password, PASSWORD_BCRYPT, $options); 
    }

    public function checkUser($username, $password){
        $user = $this->unique('nomUtilisateur',$username);
        if($user){
            if(password_verify($password, $user['password'])){
                session_regenerate_id();
                $_SESSION['id'] = $user['id'];
                $_SESSION['prenom'] = $user['prenom'];
                $_SESSION['idRole'] = $user['idRole'];
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

