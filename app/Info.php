<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    public function comunidad()
    {
        return $this->belongsTo('App\Comunidad');
    }
}
