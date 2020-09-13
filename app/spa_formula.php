<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spa_formula extends Model
{
    protected $primaryKey = 'id_spa';
    public $incrementing = false;
    protected $fillable =[
        'id_spa'  ,
        'id_pro' ,
        'volume' ,
      ];
}
