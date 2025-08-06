<?php
namespace App\Models;
use App\Models\CRUD;

class Member extends CRUD {
    protected $table = "membre";
    protected $primaryKey = "id";
    protected $fillable = ['prenom', 'nom','pseudonyme', 'idUtilisateur'];
} 

