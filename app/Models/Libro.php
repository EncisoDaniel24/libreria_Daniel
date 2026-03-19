<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //Indicar cuales son los campos que el usuario si puede cambiar 
    protected $fillable = ['nombre','autor','editorial','precio'];  

    

}
