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

class MemberController{

    public function index(){
        $member = new Member;
        $members = $member->select();
        return View::render('member/index', ['members'=>$members]);
    }

    public function show($data){
        if(isset($data['id']) && $data['id']!=null){
            $image = new Image;
            $images = $image->select();
            $stamp = new Stamp;
            $stamps = $stamp->select();
            $auction = new Auction;
            $auctions = $auction->select();
            $bid = new Bid;
            $bids = $bid->select();
            $member = new Member;
            $selectId = $member->selectId($data['id']);
            if($selectId){
                return View::render('member/show', ['member'=>$selectId, 'images'=> $images, 'stamps'=> $stamps, 'auctions' => $auctions, 'bids'=>$bids ]);
            }else{
                return View::render('error', ['message'=>'Membre pas trouvé!']);
            }
        }else{
            return View::render('error', ['message'=>'404 pas trouvé!']);
        }
    }


    public function create(){
        return View::render('member/create');
    }

    public function edit($data){
        Auth::session();
        if(isset($data['id']) && $data['id']!=null){
            $member = new Member;
            $selectId = $member->selectId($data['id']);
            if($selectId){
                return View::render('member/edit', ['member'=>$selectId]);
            }else{
                return View::render('error', ['message'=>'Membre non trouvé!']);
            }
        }else{
            return View::render('error', ['message'=>'404 page introuvable!']);
        }
    }


   public function store($data){
        $validator = new Validator;
        $validator->field('prenom', $data['prenom'])->min(2)->max(45);
        $validator->field('nom', $data['nom'])->min(2)->max(45);        
        $validator->field('telephone',$data['telephone'])->min(12)->max(14);
        $validator->field('courriel', $data['courriel'])->min(6)->max(50)->email();
        $validator->field('username', $data['username'])->min(6)->max(50)->email();
        $validator->field('password', $data['password'])->min(6)->max(20);

        if($validator->isSuccess()){
           
            $member = new Member;
            $data['password'] =  $member->hashPassword($data['password']);
            $insertMember = $member -> insert($data);            
            return View::redirect('login', ['member', $insertMember]);
        }else{
            $errors = $validator->getErrors();
            return View::render('member/create', ['errors'=>$errors, 'member'=>$data]);
        }

    }

    function update($data, $get){   
        Auth::session();         
        if(isset($get['id']) && $get['id']!=null){
            $id = $_SESSION['id'];
            $validator = new Validator;
            $validator->field('prenom', $data['prenom'])->min(2)->max(45);
            $validator->field('nom', $data['nom'])->min(2)->max(45);
            $validator->field('telephone',$data['telephone'])->min(12)->max(15);
            $validator->field('courriel', $data['courriel'])->min(6)->max(50)->email();
            if($validator->isSuccess()){
                $member = new Member;
                $update = $member->update($data, $get['id']);                
                if($update){ 
                    return View::redirect('member/show', ['id' => $id]);
                }else{
                    return View::render('error', ['message'=>'Ne peux pas mettre à jour!']);
                }
            }else{
                $errors = $validator->getErrors();
                return View::render('member/edit', ['errors'=>$errors, 'member'=>$data]);
            }
        }else{
            return View::render('error', ['message'=>'404 non trouvé!']);
        }
    }

    public function delete($data){
        if(Auth::session()) {
        $member = new Member;
        $delete = $member->delete($data['id']);
        if($delete){
            return View::redirect('members');
        }else{
            return View::render('error', ['message'=>'404 non trouvé !']);
        }
    }
}

}
?>