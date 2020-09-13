<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee_phone extends Model
{
    protected $primaryKey = 'id_emp';
    public $incrementing = false;
    protected $fillable =[
        'id_emp'  ,
        'emp_phone_number' ,
      ];

}
