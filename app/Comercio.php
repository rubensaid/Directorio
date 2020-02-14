<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    //
    
    protected $fillable = [
      'shortname',
      'publicname',
      'webpage',
      'facebook',
      'imageprofile'
    ];
    
    public $profileBase = '/comercios/';
}
