<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	protected $fillable = ['name','picture'];

    public function registro()
    {
        return $this->belongsTo('App\Registro');
    }
}
