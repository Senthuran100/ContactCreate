<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    //
public $table = 'Telephone';
 
public $fillable = ['name','phonenumber','mobile','id'];
}
