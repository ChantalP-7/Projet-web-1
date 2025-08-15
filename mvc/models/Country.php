<?php
namespace App\Models;
use App\Models\CRUD;


class Country extends CRUD {
    protected $table = "paysorigine";
    protected $primaryKey = "id";
    protected $fillable = ['pays'];
}


?>