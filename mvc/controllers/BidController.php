<?php
namespace App\Controllers;
use App\Models\Bid;
use App\Models\Member;
use App\Models\Stamp;
use App\Models\Auction;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;


class BidController {

    public function index(){
        $bid = new Bid;
        $bids = $bid->select();
        $auction = new Auction;
        $auctions = $auction->select();
        $member = new Member;
        $members = $member->select();
        $stamp = new Stamp;
        $stamps = $stamp->select();        
        return View::render('bid/index', ['bids'=> $bids, 'auctions'=>$auctions, 'members'=>$members, 'stamps'=>$stamps]);
    }


    /*public function create(){
        Auth::session();
        $idMembre = $_SESSION['id'];
        $idTimbre = $_SESSION['idTimbre'];
        $auction = new Auction;
        $auctions = $auction->select(); 
        $member = new Member;
        $members = $member->select(); 
        $stamp = new Stamp;
        $stamps = $stamp->select();
        
        return View::render('stamp/create', ['idMembre' => $idMembre, 'idTimbre' => $idTimbre, 'members'=> $members, 'auctions' => $auctions, 'stamps'=>$stamps]);
    }*/

     public function show($data){
        if(isset($data['id']) && $data['id']!=null){
            $bid = new Bid;
            $bids = $bid->select();
            $selectId = $bid->selectId($data['id']);
            if($selectId){  
                //$idMember = $selectId($data['idMembre']);
                $member = new Member;
                /*$selectedMember = $member->selectId($idMember);
                $prenom = $selectedMember['prenom'];
                $nom = $selectedMember['nom'];*/
                $members = $member->select();
                //$idAuction = $selectId($data['idEnchere']);
                
                $idEnchere = $selectId['idEnchere'];

                $auction = new Auction; 
                $auctions = $auction->select();
                
                //$nbMises = $bid->nbMises($idEnchere);
                 
                $stamp = new Stamp;
                $stamps = $stamp->select();  

                $idMembre = $selectId['idMembre'];
                $selectedMember = $member->selectId($idMembre);
                //$prenom = $selectedMember->selectId('prenom');
                //$nom = $selectedMember->selectId('nom');

                
                //$derniereMise = $bids[0]['mise'];

                return View::render('bid/show', ['bid'=>$selectId, 'idMembre'=>$idMembre, /* 'prenom' => $prenom, 'nom' => $nom, /*'dateDebut', $dateDebut, 'dateFin', $dateFin, 'prixPlancher', $prixPlancher, 'lot', $lot,*/  'auctions'=> $auctions,  'members' => $members, 'stamps' => $stamps/*, 'nbMises'=>$nbMises*/ ]);
            }else{
                return View::render('error', ['message'=>'Mises pas trouvées!']);
            }
        }else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }


    public function create(){
        Auth::session();
        $idMember = $_SESSION['id'];        
        
        $auction = new Auction;
        $auctions = $auction->select();        
        $member = new Member;
        $members = $member->select(); 
        $stamp = new Stamp;
        $stamps = $stamp->select();
        
        return View::render('auction/show', ['idMember' => $idMember, 'members'=> $members, 'auctions' => $auctions, 'stamps'=>$stamps]);
    }

    public function store($data) {              
        $data['idMembre'] = $_SESSION['id'];
        $validator = new Validator;
        $member = new Member;
        $auction = new Auction;
        $data['date'] = date("Y-m-d H:i:s");
        $validator->field('mise', $data['mise'])->required();         
       // $validator->field('idMembre', $data['idMembre'])->required(); 
        //$validator->field('idTimbre', $data['idTimbre'])->required();
        if($validator->isSuccess() && $data['idEnchere'] && $data['idMembre']&& $data['date']) {
            
            $bid = new Bid;
            $insertBid = $bid->insert($data);
            $bids = $bid->select();
            if($insertBid) {                
                //return View::redirect('bid/index', ['bids'=>$bids] );
                return View::redirect('bid/show?id='.$insertBid);
            } else {
                return View::render('error', ['message'=>'404 page pas trouvée!']);
            }
        }else {
            
            // Retour avec erreurs
            $errors = $validator->getErrors();
            $member = new Member;
            $idMember = $member->selectId("idMembre");
            $auction = new Auction;
            $idAuction = $auction->selectId("idEnchere");                            
            return View::render('auction/show', ['errors'=>$errors,'idMember' => $idMember, 'idAuction'=>$idAuction]);
            $errors = $validator->getErrors();
            print_r($errors);            
        }
    }


    public function edit($data){
        Auth::session();
        if(isset($data['id']) && $data['id']!=null){
            $bid = new Bid;
            $selectId = $bid->selectId($data['id']);
            if($selectId){
                return View::render('bid/edit', ['bid'=>$selectId]);
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
            $validator->field('mise', $data['mise'])->required()->max(500);
            $validator->field('date', $data['date'])->required();
            if($validator->isSuccess()){
                $bid = new Auction;
                $update = $bid->update($data, $get['id']);                
                if($update){                    
                $selectedBid = $bid->selectId($id);                
                    return View::redirect('bid/show', ['id' => $id]);
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
        $bid = new Bid;
        $delete = $bid->delete($data['id']);
        if($delete){
            return View::redirect('bids');
        }else{
            return View::render('error', ['message'=>'404 non trouvé !']);
        }
    }
}

}