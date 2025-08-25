<?php
namespace App\Providers;
use App\Providers\View;

class ImageUpload  {    

    /**Références :  https://www.w3schools.com/php/php_file_upload.asp */
    
    public function uploadMyImage() {

        if(isset($_FILES["file"]) ) {

        $uploadOk = 1;
        
        $tmpName = $_FILES['file']['tmp_name'];
        $name = basename($_FILES['file']['name']);
        $imageFileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));

        $check = getimagesize($tmpName);
        if($check !== false) {
            echo "Le fichier est bien une image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Le fichier n'est pas une image.";
            $uploadOk = 0;
        }
        }

        // Check if file already exists
        if (file_exists($name)) {
        echo "Désolé, l'image existe déjà. Choisis une autre.";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["file"]["size"] > 500000) {
        echo "Désolé, cette image est trop grande. Elle ne doit pas dépasser 2MO.";
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "svg" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "web" ) {
        echo "Désolé, extension acceptée :  JPG, JPEG, PNG, SVG, WEBP & GIF.";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "Désolée, le fichier n'a pu être téléchargé.";
        // if everything is ok, try to upload file
        } else {

            move_uploaded_file($tmpName, '../public/images/uploads/'.$name);
        if (move_uploaded_file($tmpName, $name)) {
            echo "L'image ". htmlspecialchars( basename( $name)). " a bien été téléchargée.";

        } else {
            echo "Désolée, il y a une erreur de téléchargement avec ton fichier.";
        }
        }

    }

    
}


?>