<?php
namespace App\Providers;

/*use Imagine\Gd\Imagine;
use Imagine\Image\Box;

class ImageOptimizer
{
    private const MAX_WIDTH = 200;
    private const MAX_HEIGHT = 150;

    private $imagine;

    public function __construct()
    {
        $this->imagine = new Imagine();
    }

    public function resize(string $filename): void
    {
        list($iwidth, $iheight) = getimagesize($filename);
        $ratio = $iwidth / $iheight;
        $width = self::MAX_WIDTH;
        $height = self::MAX_HEIGHT;
        if ($width / $height > $ratio) {
            $width = $height * $ratio;
        } else {
            $height = $width / $ratio;
        }

        $photo = $this->imagine->open($filename);
        $photo->resize(new Box($width, $height))->save($filename);
    }


}*/



/**Références :  https://www.w3schools.com/php/php_file_upload.asp */


class uploadImg {
    
    public function imgUpload() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
            if (isset($_FILES['imageToUpload']) && $_FILES['imageToUpload']['error'] == 0) {
            $dossierUpload = '/images/uploads/';
            $fichierTemporaire = $_FILES['imageToUpload']['tmp_name'];
            $nomFichier = $_FILES['imageToUpload']['image'];
            $cheminDestination = $dossierUpload . $nomFichier;

            // Vérifier si le dossier existe, le créer si nécessaire
            /*if (!is_dir($dossierUpload)) {
                mkdir($dossierUpload, 0777, true); // Créer le dossier avec les permissions appropriées
            }*/

            // Déplacer le fichier
            if (move_uploaded_file($fichierTemporaire, $cheminDestination)) {
                echo "Le fichier a été téléchargé avec succès dans " . $cheminDestination;
            } else {
                echo "Erreur lors du téléchargement du fichier.";
            }
        } else {
            echo "Erreur lors du téléchargement du fichier: " . $_FILES['imageToUpload']['error'];
        }
    }
}


    
   /* public function uploadMyImage() {

        $target_dir = "/images/uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
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
        if ($_FILES["image"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "L'image ". htmlspecialchars( basename( $_FILES["image"]["name"])). " a bien été téléchargée.";
        } else {
            echo "Désolée, il y a une erreur de téléchargement avec ton fichier.";
        }
        }

    }*/

}






/*class cheminUpload {    
    public function upload() {
        $cheminUpload = "/upload";
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image']) &&  !empty($_FILES['image'])) {
            $tmp_name = $_FILES['image']['tmp_name'];
            $name = basename($_FILES['image']['name']);
            $path = "$cheminUpload/$name";
            
            if(move_uploaded_file($tmp_name, $path)) {
                $message = "Image téléchargée avec succès.";
                
            } else {
                $message = "Erreur lors du téléchargement de l'image";
            }

        }
    }
}*/

?>