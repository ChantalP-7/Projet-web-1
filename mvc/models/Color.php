<?php
namespace App\Models;
use App\Models\CRUD;

class Color extends CRUD {
    protected $table = "couleur";
    protected $primaryKey = "id";
    protected $fillable = ['couleur'];
}


?>