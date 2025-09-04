<?php
namespace App\Models;
use App\Models\CRUD;

class Bid extends CRUD {
    protected $table = "mise";
    protected $primaryKey = "id";
    protected $fillable = ['mise', 'date', 'idMembre', 'idEnchere'];

    public function derniereMise($idEnchere) {
        // Utilisation de la méthode query pour récupérer la dernière mise
       
        $sql = "SELECT mise FROM $this->table WHERE idEnchere = :idEnchere ORDER BY date DESC LIMIT 1";
        $stmt = $this->prepare($sql); // Préparer la requête
        $stmt->bindParam(':idEnchere', $idEnchere, \PDO::PARAM_INT); // Lier l'ID de l'enchère
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    
    public function nbMises($idEnchere){
        $sql = "SELECT COUNT(*) FROM $this->table WHERE idEnchere = :idEnchere";
        $stmt = $this->prepare($sql); // Préparer la requête
        $stmt->bindParam(':idEnchere', $idEnchere, \PDO::PARAM_INT); // Lier l'ID de l'enchère
        $stmt->execute();
        return $stmt->fetchColumn();
    }    
}

?>