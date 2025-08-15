<?php
namespace App\Controllers;
use App\Models\Member;
use App\Models\Stamp;
use App\Models\Format;
use App\Models\Color;
use App\Models\Country;
use App\Models\Condition;
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
        $member = new Member;
        $idMember = $member->selectId("idMembre");
        $format = new Format;
        $formats = $format->select(); 
        $color = new Color;
        $colors = $color->select(); 
        $condition = new Condition;
        $conditions = $condition->select(); 
        $country = new country;
        $countries = $country->select(); 
        return View::render('stamp/create', ['idMembre' => $idMember,'formats' => $formats, 'colors'=> $colors, 'conditions' => $conditions, 'countries' => $countries]);
    }

     public function show($data){
        if(isset($data['id']) && $data['id']!=null){
            $stamp = new Stamp;
            $selectId = $stamp->selectId($data['id']);
            if($selectId){
                return View::render('stamp/show', ['stamp'=>$selectId ]);
            }else{
                return View::render('error', ['message'=>'Timbre pas trouvé!']);
            }
        }else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }


    public function store($data) { 
        Auth::session();       
        $validator = new Validator;
        $validator->field('nom', $data['nom'])->min(5)->max(45)->required();
        $validator->field('lot', $data['lot'])->min(5)->max(45)->required();
        $validator->field('datePublication', $data['datePublication'])->required();
        $validator->field('idPaysOrigine', $data['idPaysOrigine'])->required(); 
        $validator->field('idCondition', $data['idCondition'])->required(); 
        $validator->field('idCouleur', $data['idCouleur'])->required(); 
        $validator->field('idFormat', $data['idFormat'])->required(); 
        $validator->field('idMembre', $data['idMembre'])->required(); 
        
        if($validator->isSuccess()) {
            $stamp = new Stamp;  
            $insertStamp = $stamp -> insert($data);

            if($insertStamp) {
                return View::redirect('stamp/show?id='.$insertStamp);
            } else {
                return View::render('error', ['message'=>'404 page pas trouvée!']);
            }
        }else {
            
            // Retour avec erreurs
            $member = new Member;
            $idMember = $member->selectId("idMembre");
            $format = new Format;
            $formats = $format->select(); 
            $color = new Color;
            $colors = $color->select(); 
            $condition = new Condition;
            $conditions = $condition->select(); 
            $country = new country;
            $countries = $country->select();
             
            return View::render('stamp/create', ['idMembre' => $idMember,'formats' => $formats, 'colors'=> $colors, 'conditions' => $conditions, 'countries' => $countries]);
            $errors = $validator->getErrors();
            print_r($errors);
            
        }
    }

    /* Autres fonctions à venir */

}