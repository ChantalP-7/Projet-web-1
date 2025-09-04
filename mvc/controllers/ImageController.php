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
             //$idTimbre = $_SESSION['idTimbre'];
            $selectId = $image->selectId($data['id']);
            //$file = $image->select();
        if($selectId) {
            //$image = new Image;
            $legende = $selectId['legende'];
            $file = $selectId['file'];
            $idTimbre = $selectId['idTimbre'];
            $ordre = $selectId['ordre'];

            return View::render('image/create', ['selectId'=>$selectId, 'idTimbre' => $idTimbre,'legende'=>$legende,  'file' => $file, 'ordre'=> $ordre]);

        }else{
                return View::render('error', ['message'=>'Image pas trouvée!']);
            }            
        }
        else{
            return View::render('error', ['message'=>'404 not found!']);
        }
    }

    
    public function create() { 
        //Auth::session();
        $timbre = new stamp;
        //$idTimbre = $timbre->selectId("IdTimbre");
        //$idStamp = $stamp->selectId($idTimbre);
        //$idTimbre = $stamp->selectId('id');        
        return View::render('image/store'/*, ['idTimbre' => $idTimbre'stamps' => $stamps, 'members'=>$members]*/);
    }

    
    public function store($data) {
        /* Références : https://www.youtube.com/watch?v=JxgulzYe5W0&t=448s */
        
        $data['idTimbre'] = $_SESSION['idTimbre']; 

        //$uploadDir = './upload/uploads/'; 
        if (isset($_FILES['files'])/* && !empty($_FILES['file']['name'][0])*/) {

       /* foreach ($_FILES as $image) {
            echo $tmp_name = $image['tmp_name'][0];
            print_r($image);
            die();
            $name = $image['name'];
            $type = $image['type'];
            $size = $image['size'];
            $error = $image['error'];*/

        foreach($_FILES['files']['name'] as $key => $name) {

            $tmpName = $_FILES['files']['tmp_name'][$key];
            $size = $_FILES['files']['size'][$key];
            $error = $_FILES['files']['error'][$key];
            $type = $_FILES['files']['type'][$key];

            move_uploaded_file($tmpName, './upload/uploads/'.$name);

        if ($error == UPLOAD_ERR_OK) {
            $validator = new Validator;
            //$imageUpload = new ImageUpload;            
            $validator->field('legende', $data['legende'])->min(5)->max(45)->required();
            $validator->field('ordre', $data['ordre'])->min(1)->max(5)->required();
            //$data['idTimbre'] = $_SESSION['idTimbre'];
            $data['file'] = $name;
           // $idTimbre = $data['idTimbre'];
            if($validator->isSuccess() && $data['file']) {
                
                $image = new Image;
                //$images = $image->select();
                $insertImage = $image->insert($data);            
                if($insertImage) {                     
                    return View::redirect('image/show?id='.$insertImage/*, ['idTimbre'=>$idTimbre]*/);
                    //return View::redirect('image/index', ['images'=> $images/*, 'insertIdTimbre'=> $insertIdTimbre*/]);
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
              echo "Le fichier \"{$name}\" a été uploadé et enregistré avec succès.<br>";
              }
        
            else {
                echo "Erreur lors du téléchargement du fichier '$name'. Code d'erreur : $error<br>";
            }
        }
    }
        else {
            echo "Non, il n'y a pas d'image téléchargée!";
        }

    }

    
    public function edit($data){
        Auth::session();
        if(isset($data['id']) && $data['id']!=null){
            $image = new Image;
            $selectId = $image->selectId($data['id']);
            if($selectId){
                return View::render('image/edit', ['image'=>$selectId]);
            }else{
                return View::render('error', ['message'=>'Image non trouvée!']);
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
            $validator->field('legende', $data['legende'])->min(2)->max(45);
            $validator->field('ordre', $data['ordre'])->min(1)->max(5)->required();           
            if($validator->isSuccess()){
                $image = new Image;
                $update = $image->update($data, $get['id']);                
                if($update){ 
                    return View::redirect('image/show', ['id' => $id]);
                }else{
                    return View::render('error', ['message'=>'Ne peux pas mettre à jour!']);
                }
            }else{
                $errors = $validator->getErrors();
                return View::render('image/edit', ['errors'=>$errors, 'image'=>$data]);
            }
        }else{
            return View::render('error', ['message'=>'404 non trouvé!']);
        }
    }

    public function delete($data){
        if(Auth::session()) {
            $image = new Image;
            $delete = $image->delete($data['id']);
            if($delete){
                return View::redirect('file');
            }else{
                return View::render('error', ['message'=>'404 non trouvé !']);
            }
        }
    }

}
    

?>
