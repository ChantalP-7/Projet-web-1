<?php
namespace App\Models;
use App\Models\CRUD;

class Bid extends CRUD {
    protected $table = "mise";
    protected $primaryKey = "id";
    protected $fillable = ['mise', 'date', 'idMembre', 'idEnchere'];


    public function totalMises($prixDepart) {

        $sommeMises = 'SELECT SUM(mise) AS total_montant FROM mise';

        return $prixDepart + $sommeMises;
    }

    public function setDateAujourdhui() {

        $dateAjourdhui ='';
        return $dateAjourdhui;        
    }

    public function getNbJoursEnchere() {

        
    }


}
?>