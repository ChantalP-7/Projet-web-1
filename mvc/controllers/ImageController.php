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
            $idTimbre = $selectStamp['idTimbre'];
            
           /* $idMembre = $selectId['idMembre'];
            $member = new Member;
            $selectMember = $member -> selectId($idMembre);*/
            //$prenom = $selectMember['prenom'];

            return View::render('image/show', ['image' => $selectId/*, 'idTimbre' => $idTimbre, 'prenom' => $prenom*/]);

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
        
        $image = new Image;
        $images = $image->select();
        $stamp = new Stamp;
        $stamps = $stamp->select();
        //$idTimbre = $stamp->selectId('id');
        $member = new Member;
        $members = $member->select();
        return View::render('image/create', [/*'idTimbre' => $idTimbre,*/'stamps' => $stamps, 'members'=>$members]);
    }

    
    public function store($data) {
        Auth::session();
        if(isset($_FILES["file"]) ) {
        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        $type = $_FILES['file']['type'];

        move_uploaded_file($tmpName, './images/uploads/'.$name);
        

        }

        $image = new Image; 
        $validator = new Validator;
        $validator->field('file', $data['file'])->min(5)->max(100)->required();
        $validator->field('ordre', $data['ordre'])->min(1)->max(5)->required();
        $validator->field('idTimbre', $data['idTimbre'])->required();
        if($validator->isSuccess()) {
            $stamp = new Stamp;
            $idStamp = $stamp->selectId('idTimbre');           
            $image = new Image;  
            $images = $image->select();  
            $insertImage = $image->insert($data);
            $insertIdTimbre = $image->insert($idStamp);
            if($insertImage) { 
                return View::redirect('image/show?id='.$insertImage, ['insertIdTimbre'=> $insertIdTimbre]);
                //return View::redirect('images/index', ['images'=> $images]);
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
