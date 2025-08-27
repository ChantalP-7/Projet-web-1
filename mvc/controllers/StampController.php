<?php
namespace App\Controllers;
use App\Models\Member;
use App\Models\Stamp;
use App\Models\Auction;
use App\Models\Format;
use App\Models\Color;
use App\Models\Country;
use App\Models\Etat;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;
use App\Models\Image;


class StampController {

    public function index(){
        $stamp = new Stamp;
        $stamps = $stamp->select();
        $image = new Image;
        $images = $image->select();
        $auction = new Auction;
        $auctions = $auction->select();
        return View::render('stamp/index', ['stamps'=>$stamps, 'images'=>$images]);
    }


    public function create(){
        Auth::session();
        $idMembre = $_SESSION['id'];
        $format = new Format;
        $formats = $format->select(); 
        $color = new Color;
        $colors = $color->select(); 
        $etat = new Etat;
        $etats = $etat->select(); 
        $country = new country;
        $countries = $country->select(); 
        $image = new Image;
        $images = $image->select();
        return View::render('stamp/create', ['idMembre' => $idMembre, 'formats' => $formats, 'colors'=> $colors, 'etats' => $etats, 'countries' => $countries, 'images', $images]);
    }

     public function show($data){
        if(isset($data['id']) && $data['id']!=null){
            $stamp = new Stamp;
            $selectId = $stamp->selectId($data['id']);
            if($selectId){  
                $idImage = $selectId($data['id']);
                $image = new Image;
                $selectedImage = $image->selectId($idImage);
                $imageTimbre = $selectedImage['file'];
                $country = new Country;   
                $countries = $country->select();
                $format = new Format;   
                $formats = $format->select();
                $etat = new Etat;   
                $etats = $etat->select();
                $color = new Color;   
                $colors = $color->select();
                $member = new Member;
                $members = $member->select();
                $idMembre = $selectId['idMembre'];
                $selectedMember = $member->selectId($idMembre);
                $prenom =  $selectedMember['prenom'];
                $nom =  $selectedMember['nom'];

                return View::render('stamp/show', ['stamp'=>$selectId, 'imageTimbre'=>$imageTimbre, 'countries'=> $countries, 'formats'=> $formats, 'etats'=> $etats, 'colors' => $colors, 'prenom' => $prenom, 'nom' => $nom, 'members' => $members ]);
            }else{
                return View::render('error', ['message'=>'Timbre pas trouvé!']);
            }
        }else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }


    public function store($data) {        
        $validator = new Validator;        
        if($validator->isSuccess()) {
            $stamp = new Stamp;      
            $insertStamp = $stamp->insert($data);
            $_SESSION['idTimbre'] = $insertStamp; // Ne pas enlever cette ligne!
            //echo $insertStamp;
            //die();

            if($insertStamp) {                
                return View::redirect('image/create');
                //return View::redirect('stamp/show?id='.$insertStamp);
            } else {
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
    }

    
    public function edit($data){
        Auth::session();
        if(isset($data['id']) && $data['id']!=null){
            $stamp = new Stamp;
            $selectId = $stamp->selectId($data['id']);
            if($selectId){
                return View::render('stamp/edit', ['stamp'=>$selectId]);
            }else{
                return View::render('error', ['message'=>'Timbre non trouvé!']);
            }
        }else{
            return View::render('error', ['message'=>'404 page introuvable!']);
        }
    }

    
   function update($data, $get){   
        Auth::session();         
        if(isset($get['id']) && $get['id']!=null){
            $id = $_SESSION['id'];
            $validator = new Validator;
            $validator->field('nom', $data['nom'])->min(2)->max(45);
            $validator->field('date', $data['date'])->required();
            if($validator->isSuccess()){
                $stamp = new Stamp;
                $update = $stamp->update($data, $get['id']);                
                if($update){                    
                $selectedStamp = $stamp->selectId($id);                
                    return View::redirect('stamp/show', ['id' => $id]);
                }else{
                    return View::render('error', ['message'=>'Ne peux pas mettre à jour!']);
                }
            }else{
                $errors = $validator->getErrors();
                return View::render('stamp/edit', ['errors'=>$errors, 'stamp'=>$data]);
            }
        }else{
            return View::render('error', ['message'=>'404 non trouvé!']);
        }
    }

    public function delete($data){
        if(Auth::session()) {
        $stamp = new Stamp;
        $delete = $stamp->delete($data['id']);
        if($delete){
            return View::redirect('stamps');
        }else{
            return View::render('error', ['message'=>'404 non trouvé !']);
        }
    }
}

}