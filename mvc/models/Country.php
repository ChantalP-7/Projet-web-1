<?php
namespace App\Models;
use App\Models\CRUD;


class Country extends CRUD {
    protected $table = "pays";
    protected $primaryKey = "id";
    protected $fillable = ['pays'];
}


?>