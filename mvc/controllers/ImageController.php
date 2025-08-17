<?php
namespace App\Controllers;
use App\Models\Image;
use App\Models\Member;
use App\Models\Stamp;
use App\Providers\View;
use App\Providers\Auth;
use App\Providers\Validator;




class ImageController { 
    
    public function index() {
        $image = new Image;
        $images = $image -> select();
        return View::render('image/index', ['images' => $images]);
    }

    
    public function show($data) {        
        if(isset($data['id']) && $data['id'] != null) {
            $image = new Image;
            $selectId = $image -> selectId($data['id']);

        if($selectId) {
            $idStamp = $selectId['idTimbre'];
            $stamp = new Stamp;
            $selectStamp = $stamp -> selectId($idStamp);
            $timbre = $selectStamp['nom'];
            
            $idMembre = $selectId['idMembre'];
            $member = new Member;
            $selectMember = $member -> selectId('idMembre');
            $nom = $selectMember['nom'];

            return View::render('image/show', ['image' => $selectId, 'timbre' => $timbre, 'nom' => $nom]);

        }else{
                return View::render('error', ['message'=>'Image pas trouvée!']);
            }
            
        }
        else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }

    
    public function create() {
        Auth::session();
        $stamp = new Stamp;
        $stamps = $stamp->select();
        $member = new Member;
        $members = $member->select();

        return View::render('image/create', ['stamps' => $stamps, 'members'=>$members]);

    }

    
    public function store($data) {
        $validator = new Validator;
        $stamp = new Stamp;
        $validator->field('nom', $data['nom'])->min(15)->max(255)->required();
        $validator->field('ordre', $data['ordre'])->min(1)->max(5)->required();
        $validator->field('idTimbre', $data['idTimbre'])->required();
        if($validator->isSuccess()) {
            $image = new Image;  
            $insertImage = $image->insert($data);
            if($insertImage) {

                return View::redirect('image/show?id='.$insertImage);
            }
            else {
                return View::render('error', ['message'=>'404 page pas trouvée!']);
            }
            
        } else {
            $errors = $validator->getErrors();
            $stamp = new Stamp;
            $idStamp = $stamp->selectId("idTimbre");

            return View::render('image/create', ['errors'=>$errors,'idStamp' => $idStamp]);
            $errors = $validator->getErrors();
            print_r($errors);
        }
        
    }

    
    public function edit() {

    }
    
    
    public function update() {

    }


    
    public function delete() {

    }


}
    

?>
