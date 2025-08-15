<?php
namespace App\Models;
use App\Models\CRUD;


class Format extends CRUD {
    protected $table = "format";
    protected $primaryKey = "id";
    protected $fillable = ['format'];
}


?>