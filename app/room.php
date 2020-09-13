<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    public function roomcategory()
    {
        return $this->belongsTo(room_category::class);
    }
    protected $primaryKey = 'room_id';
}
