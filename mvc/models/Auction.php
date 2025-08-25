<?php
namespace App\Models;
use App\Models\CRUD;

class Auction extends CRUD {
    protected $table = "enchere";
    protected $primaryKey = "id";
    protected $fillable = ['lot', 'dateDebut', 'dateFin', 'prixPlancher', 'CoupDeCoeurLord', 'actif', 'idTimbre'];
} 