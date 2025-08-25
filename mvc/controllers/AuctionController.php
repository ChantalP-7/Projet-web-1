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


    /*public function create(){       
        $idTimbre = $_SESSION['idTimbre'];       
        return View::render('stamp/create', ['idTimbre' => $idTimbre]);
    }*/

    public function show($data){        
        if(isset($data['id']) && $data['id']!=null){
            $auction = new Auction;
            $selectId = $auction->selectId($data['id']);
            if($selectId){                 
                $idTimbre = $selectId['idTimbre'];
                $timbre = new Stamp;;
                $selectedTimbre = $timbre->selectId($idTimbre);
                $nomTimbre = $selectedTimbre['nom'];
                $lot = $selectId['lot'];
                $dateDebut = $selectId['dateDebut'];
                $dateFin = $selectId['dateFin'];
                $prixPlancher = $selectId['prixPlancher'];
                $CoupDeCoeurLord = $selectId['CoupDeCoeurLord'];
                
                
                //$idImage = $selectId['idTimbre'];
                $image = new Image;
                $images = $image->select();
                $idImage = $image->selectId($idTimbre);
                //$selectedImage = $image->selectId($idImage);
                //$file = $selectedImage['file'];

                return View::render('auction/show', ['auction'=>$selectId, 'nomTimbre'=>$nomTimbre, 'idImage'=>$idImage, 'lot' => $lot, /*'file'=>$file,*/ 'images' =>$images, 'dateDebut'=>$dateDebut, 'dateFin'=>$dateFin, 'prixPlancher'=> $prixPlancher, 'CoupDeCoeurLord' =>$CoupDeCoeurLord]);
            }else{
                return View::render('error', ['message'=>'Timbre pas trouvé!']);
            }
        }else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }


    /*public function store($data) {        
        $validator = new Validator;
        $member = new Member;
        $format = new Format;
        $etat = new Etat;
        $color = new Color;
        $country = new Country;

        $validator->field('lot', $data['lot'])->min(5)->max(45)->required();        
        $validator->field('dateDebut', $data['dateDebut'])->required();
        $validator->field('dateFin', $data['dateFin'])->required();
        $validator->field('prixPlancher', $data['prixPlancher'])->required(); 
        $validator->field('CoupDeCoeurLord', $data['CoupDeCoeurLord'])->required(); 
        $validator->field('actif', $data['actif'])->required(); 
        $validator->field('idTimbre', $data['idTimbre'])->required();
        if($validator->isSuccess()) {
            
            $stamp = new Stamp;      
            $insertStamp = $stamp->insert($data);
            if($insertStamp) {                
                return View::redirect('image/create', ['idTimbre='.$insertStamp] );
                //return View::redirect('stamp/show?id='.$insertStamp);
            /*} else {
                return View::render('error', ['message'=>'404 page pas trouvée!']);
            }
        }else {
            
            // Retour avec erreurs
            $errors = $validator->getErrors();
            $member = new Member;
            $idMember = $member->selectId("idMembre");
            $format = new Format;
            $formats = $format->select(); 
            $color = new Color;
            $colors = $color->select(); 
            $etat = new Etat;
            $etats = $etat->select(); 
            $country = new country;
            $countries = $country->select();
                
            return View::render('stamp/create', ['errors'=>$errors,'idMembre' => $idMember,'formats' => $formats, 'colors'=> $colors, 'etats' => $etats, 'countries' => $countries]);
            $errors = $validator->getErrors();
            print_r($errors);
            
        }
    }*/
    
    public function edit() {

    }

    
    public function update() {

    }
    
    public function delete() {

    }

}