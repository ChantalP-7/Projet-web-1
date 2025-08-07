<?php 

namespace App\Controllers;
use App\Providers\View;
use App\Models\Home;


class HomeController {
    public function index() {       
        return View::render('home/index');
    }
}
