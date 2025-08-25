<?php
namespace App\Controllers;
use App\Models\Member;
use App\Models\Stamp;
use App\Models\Format;
use App\Models\Color;
use App\Models\Country;
use App\Models\Etat;
use App\Models\Image;
use App\Models\Auction;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;



class HomeController { 
       
    public function index(){
        $auction = new Auction;
        $auctions = $auction->select();
        $country = new Country; 
        $stamp = new Stamp;
        $stamps = $stamp->select();
        $countries = $country->select();
        $format = new Format;   
        $formats = $format->select();
        $etat = new Etat;   
        $etats = $etat->select();
        $color = new Color;   
        $colors = $color->select();
        $image = new Image;
        $images = $image->select();
        $member = new Member;
        $members = $member->select();
        //$idMembre = $selectId['idMembre'];
        //$selectedMember = $member->selectId($idMembre);
    return View::render('home/index', ['stamps'=>$stamps, 'members'=>$members, 'images'=>$images, 'countries'=>$countries, 'etats'=>$etats, 'auctions'=>$auctions]);
    }
    
}
