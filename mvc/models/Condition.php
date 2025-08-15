<?php
namespace App\Models;
use App\Models\CRUD;


class Condition extends CRUD {
    protected $table = "lacondition";
    protected $primaryKey = "id";
    protected $fillable = ['lacondition'];
}


?>