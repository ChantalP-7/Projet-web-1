<?php
namespace App\Controllers;
use App\Models\Member;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;
use App\Models\User;
use App\Models\Role;

class MemberController{

    public function __construct(){
        Auth::session();
    }   

    public function create(){
        Auth::session();       
        $user = new user;
        $idUser = $user->selectId("IdUtilisateur");
        return View::render('member/create', ['idUtilisateur' => $idUser]);
    }
    
    public function index(){
        $member = new Member;
        $members = $member->select();
        print_r($_SESSION);
        return View::render('member/index', ['members'=>$members]);
    }

    public function show($data){
        if(isset($data['id']) && $data['id']!=null){
            $member = new Member;
            $selectId = $member->selectId($data['id']);
            if($selectId){
                return View::render('member/show', ['member'=>$selectId ]);
            }else{
                return View::render('error', ['message'=>'Membre pas trouvé!']);
            }
        }else{
            return View::render('error', ['message'=>'404 not found!']);
        }
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


   public function store($data) { 
        Auth::session();       
        $validator = new Validator;
        $validator->field('prenom', $data['prenom'])->min(2)->max(45)->required();
        $validator->field('nom', $data['nom'])->min(2)->max(45)->required();
        $validator->field('pseudonyme', $data['pseudonyme'])->max(45);
        $validator->field('telephone', $data['telephone'])->max(20)->required(); 
        
        if($validator->isSuccess()) {
            $user = new User;
            
            $insertUser = $user -> insert($data);
            $member = new Member;
            $data['idUtilisateur'] = $insertUser;
            $insertMember = $member->insert($data);

            if($insertMember) {
                return View::redirect('member/show?id='.$insertMember);
            } else {
                return View::render('error', ['message'=>'404 page pas trouvée!']);
            }
        }else {
            $errors = $validator->getErrors();
            print_r($errors);
            return View::render('member/create', ['errors'=>$errors, 'member'=>$data]);
        }
    }

    function update($data, $get){   
        Auth::session(); 
        if(isset($get['id']) && $get['id']!=null){
            $validator = new Validator;
            $validator->field('prenom',$data['prenom'])->min(2)->max(45);
            $validator->field('nom',$data['nom'])->min(2)->max(45);
            $validator->field('pseudonyme',$data['pseudonyme'])->max(45);
            $validator->field('telephone',$data['telephone'])->max(20);

            if($validator->isSuccess()){
                $member = new Member;
                $update = $member->update($data, $get['id']);
                if($update){
                    return View::redirect('members');
                }else{
                    return View::render('error', ['message'=>'Ne peux pas mettre à jour!']);
                }
            }else{
                $errors = $validator->getErrors();
                return View::render('member/edit', ['errors'=>$errors, 'member'=>$data]);
            }
        }else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }

    public function delete($data){

        if(Auth::session() && Auth::role(2)  ) {
        $member = new Member;

    $delete = $member->delete($data['id']);
    if($delete){
        return View::redirect('members');
    }else{
        return View::render('error', ['message'=>'404 page introuvable !']);
    }
    }
}

}
?>