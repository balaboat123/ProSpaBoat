<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee_day extends Model
{
    protected $primaryKey = 'id_empday';
    public $incrementing = false;
    protected $fillable =[
        'id_empday'  ,
        'emp_day' ,
      ];
}
