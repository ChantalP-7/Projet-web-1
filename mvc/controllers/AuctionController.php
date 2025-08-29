<?php
namespace App\Controllers;
use App\Models\Auction;
use App\Models\Member;
use App\Models\Stamp;
use App\Models\Image;
use App\Models\Format;
use App\Models\Color;
use App\Models\Country;
use App\Models\Etat;
use App\Models\Bid;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;
//use App\Providers\Timbre;



class AuctionController {

    public function index(){
        $auction = new Auction;
        $auctions = $auction->select();
        $stamp = new Stamp;
        $stamps = $stamp->select();
        $image = new Image;
        $images = $image->select();
        return View::render('auction/index', ['auctions'=>$auctions, 'stamps'=>$stamps, 'images'=>$images]);
    }

    public function show($data){ 
        if(isset($data['id']) && $data['id']!=null){;
            
            $auction = new Auction;
            $selectId = $auction->selectId($data['id']);
            $_SESSION['idEnchere'] = $selectId;
            if($selectId){  
                $stamp = new Stamp; 
                $stamps = $stamp->select(); 
                $image = new Image;
                $images = $image->select();
                $member = new Member;
                $members = $member->select();
                $country = new Country;
                $countries = $country->select();
                $format = new Format;   
                $formats = $format->select();
                $etat = new Etat;   
                $etats = $etat->select();
                $color = new Color;   
                $colors = $color->select();
                $bid = new Bid;   
                $bids = $bid->select();

                // Sélection pour les enchères
                $idTimbre = $selectId['idTimbre'];
                $id = $selectId['id'];
                
                $selectedTimbre = $stamp->selectId($idTimbre);
                $selectedIdTimbre = $stamp->selectId($id);
                $nomTimbre = $selectedTimbre['nom'];

                $idMember = $selectId['idTimbre'];
                $selectedMember = $member->selectId($idMember);

                $lot = $selectId['lot'];
                $dateDebut = $selectId['dateDebut'];
                $dateFin = $selectId['dateFin'];
                $prixPlancher = $selectId['prixPlancher'];
                $CoupDeCoeurLord = $selectId['CoupDeCoeurLord'];

                return View::render('auction/show', ['auction'=>$selectId, 'nomTimbre'=>$nomTimbre, /*'idImage'=>$idImage,*/ 'lot' => $lot, 'members'=>$members, 'formats'=>$formats , 'etats'=>$etats, 'countries'=> $countries, 'colors'=>$colors, 'selectedIdTimbre'=> $selectedIdTimbre, 'images' =>$images, 'dateDebut'=>$dateDebut, 'dateFin'=>$dateFin, 'prixPlancher'=> $prixPlancher, 'CoupDeCoeurLord' =>$CoupDeCoeurLord, /*'prenom'=> $prenom, 'nom'=>$nom,*/ 'stamps'=>$stamps, 'images'=>$images, 'members'=>$members, 'bids'=>$bids ]);
            }else{
                return View::render('error', ['message'=>'Timbre pas trouvé!']);
            }
        }else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }


    

    

    


    
    
   

}