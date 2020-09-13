<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'emp_id';
}
