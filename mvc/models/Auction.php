<?php
namespace App\Models;
use App\Models\CRUD;

class Auction extends CRUD {
    protected $table = "enchere";
    protected $primaryKey = "id";
    protected $fillable = ['lot', 'dateDebut', 'dateFin', 'prixPlancher', 'CoupDeCoeurLord', 'actif', 'idTimbre'];

     public function coupCoeurLord() {
        // Utilisation de la méthode query pour récupérer la dernière mise
       
        $sql = "SELECT * FROM $this->table WHERE CoupDeCoeurLord = TRUE";
        $stmt = $this->prepare($sql); // Préparer la requête
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
} 