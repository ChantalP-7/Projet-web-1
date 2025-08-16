<?php
namespace App\Controllers;
use App\Models\Member;
use App\Models\Stamp;
use App\Models\Format;
use App\Models\Color;
use App\Models\Country;
use App\Models\Etat;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;


class StampController {

    public function index(){
        $stamp = new Stamp;
        $stamps = $stamp->select();
        return View::render('stamp/index', ['stamps'=>$stamps]);
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
        return View::render('stamp/create', ['idMembre' => $idMembre, 'formats' => $formats, 'colors'=> $colors, 'etats' => $etats, 'countries' => $countries]);
    }

     public function show($data){
        if(isset($data['id']) && $data['id']!=null){
            $stamp = new Stamp;
            $selectId = $stamp->selectId($data['id']);
            if($selectId){   
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

                /**Sélection du membre auteur */
                $idMembre = $selectId['idMembre'];
                $member = new Member;
                $selectedMember = $member->selectId($idMembre);
                $prenom =  $selectedMember['prenom'];
                $nom =  $selectedMember['nom'];

                return View::render('stamp/show', ['stamp'=>$selectId, 'countries'=> $countries, 'formats'=> $formats, 'etats'=> $etats, 'colors' => $colors, 'prenom' => $prenom, 'nom' => $nom, 'members' => $members ]);
            }else{
                return View::render('error', ['message'=>'Timbre pas trouvé!']);
            }
        }else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }


    public function store($data) {
        $validator = new Validator;
        $member = new Member;
        $format = new Format;
        $etat = new Etat;
        $color = new Color;
        $country = new Country;

        $validator->field('nom', $data['nom'])->min(5)->max(45)->required();
        $validator->field('lot', $data['lot'])->min(5)->max(45)->required();
        $validator->field('date', $data['date'])->required();
        $validator->field('idPays', $data['idPays'])->required(); 
        $validator->field('idEtat', $data['idEtat'])->required(); 
        $validator->field('idCouleur', $data['idCouleur'])->required(); 
        $validator->field('idFormat', $data['idFormat'])->required(); 
        $validator->field('idMembre', $data['idMembre'])->required(); 
        

        /** Problème à régler ici au niveau de l'idMembre */
        
        if($validator->isSuccess()) {
            //$member = new Member; 
            //$insertMember = $member -> insert($data);
            //$data['idMembre'] = $insertMember;
            $stamp = new Stamp;            
            $insertStamp = $stamp->insert($data);
            if($insertStamp) {
                return View::redirect('stamp/show?id='.$insertStamp);
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

    /* Autres fonctions à venir */

}