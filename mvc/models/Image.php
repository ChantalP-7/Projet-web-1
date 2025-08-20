<?php
namespace App\Models;
use App\Models\CRUD;

class Image extends CRUD {
    protected $table = "image";
    protected $primaryKey = "id";
    protected $fillable = ['image', 'ordre'];

    /**Références :  https://www.w3schools.com/php/php_file_upload.asp */
    
    public function uploadMyImage() {

        $target_dir = "/images/uploads/";
        $target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "Le fichier est bien une image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Le fichier n'est pas une image.";
            $uploadOk = 0;
        }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
        echo "Désolé, l'image existe déjà. Choisis une autre.";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["imageToUpload"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
            echo "L'image ". htmlspecialchars( basename( $_FILES["imageToUpload"]["name"])). " a bien été téléchargée.";
        } else {
            echo "Désolée, il y a une erreur de téléchargement avec ton fichier.";
        }
        }

    }

    
}


?>