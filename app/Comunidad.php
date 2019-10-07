<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunidad extends Model
{
    protected $fillable = ['name','slug','avatar','describir'];
    /**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'slug';
	}

	public function infos()
    {
        return $this->hasMany('App\Info');
    }
}
