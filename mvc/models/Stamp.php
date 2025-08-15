<?php
namespace App\Models;
use App\Models\CRUD;


class Stamp extends CRUD {
    protected $table = "timbre";
    protected $primaryKey = "id";
    protected $fillable = ['lot', 'nom', 'datePublication', 'idPaysOrigine', 'idCondition', 'idCouleur', 'idFormat', 'idMembre'];
}


?>