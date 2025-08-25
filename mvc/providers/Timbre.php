<?php
namespace App\Providers;

use App\Providers\View;

class Timbre {
    static public function session(){
        if(isset($_SESSION['idTimbre']) AND $_SESSION['idTimbre'] = null){
            return true;
        } /*else {
            return view::redirect('login');
            exit();
        }*/
    }    
}