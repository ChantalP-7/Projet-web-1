<?php
namespace App\Controllers;
use App\Models\Image;
use App\Models\Member;
use App\Models\Stamp;
use App\Providers\View;
use App\Providers\ImageUpload;
use App\Providers\Auth;
use App\Providers\Validator;
use App\Providers\Timbre;

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
            //$images = $image->select();

        if($selectId) {
            //$image = new Image;
            $legende = $selectId['legende'];
            $file = $selectId['file'];
            $idTimbre = $selectId['idTimbre'];
            $ordre = $selectId['ordre'];

            //return View::render('image/create', ['selectId'=>$selectId, 'idTimbre' => $idTimbre,'legende'=>$legende,  'file' => $file, 'ordre'=> $ordre]);

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
        return View::render('image/create'/*, ['idTimbre' => $idTimbre'stamps' => $stamps, 'members'=>$members]*/);
    }

    
    public function store($data) {
        /* Références : https://www.youtube.com/watch?v=JxgulzYe5W0&t=448s */
        //$timbre = new Timbre;
        //$t = $timbre->
        $data['idTimbre'] = $_SESSION['idTimbre']; 
        if(isset($_FILES["file"]) ) {

            $uploadedFiles = $_FILES['file'];


            //for ($i = 0; $i < count($uploadedFiles['name']); $i++) {
            $name = $uploadedFiles['name']/*[$i]*/;
            $tmpName = $uploadedFiles['tmp_name']/*[$i]*/;
            ///$fileType = $uploadedFiles['type'][$i];


             /*foreach ($_FILES['file']['name'] as $key => $name) {
                $tmpName = $_FILES['file']['tmp_name'][$key];
                //$fileName = basename($name); // Nom du fichier*/
            $data['file'] = $name;

            //$file = $_FILES['file'];
            //if ($file['error'] === UPLOAD_ERR_OK) {            
            
            //$name = $file['name'];
            //$size = $fileName['size'];
            //$error = $fileName['error'];
            //$type = $fileName['type'];

            $tabExtensions = explode('.', $name);
            $extensions = strtolower(end($tabExtensions));
            $extensionsValides = ['jpg', 'jpeg', 'png', 'svg', 'gif', 'webp'];
            $tailleMax = "40000";
            //var_dump($size);
           // die();
            //if(in_array($extensions, $extensionsValides) && $size <= $tailleMax && !$error ) {                
            move_uploaded_file($tmpName, './upload/uploads/'.$name);                 
            /*} else {
                echo 'Mauvaise extension de fichier ou taille trop lourde de fichier.';
            }*/        
            //$data = file_get_contents($_FILES['file']['tmp_name']);                    
            //$fileString = get_
            //$image = new Image; 
            $validator = new Validator;
            //$imageUpload = new ImageUpload;            
            $validator->field('legende', $data['legende'])->min(5)->max(45)->required();
            $validator->field('ordre', $data['ordre'])->min(1)->max(5)->required();
            //$validator->field('idTimbre', $data['idTimbre']);
            
            //$data['idTimbre'] = $_SESSION['idTimbre'];
            //$data['idTimbre'] = $_SESSION['idTimbre'];

           // $idTimbre = $data['idTimbre'];
            if($validator->isSuccess() && $data['file']) {
                
                /*$timbre = new Stamp;
                $idTimbre = $timbre -> selectId('id');
                $insertTimbre = $idTimbre -> insert('id');*/
                //$selectedTimbre = $timbre->selectId("idTimbre");
                $image = new Image;
                //$data['idTimbre'] = $insertTimbre;
                $insertImage = $image->insert($data);            
                if($insertImage) { 
                    echo "Oui, image insérée!";
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
        }

    //}

        else {
            echo "Non, il n'y a pas d'image téléchargée!";
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
