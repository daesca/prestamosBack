<?php

namespace App\Models;

class Client extends Model
{
    protected $table    = 'cliente';
    protected $fillable = ['nombres', 'apellidos', 'fecha_nacimiento'];

    public $timestamps  = false;

}