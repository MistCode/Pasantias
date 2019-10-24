<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PostMessage;

class Send extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['sender_id','name','recipient_id', 'body'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function notifications()
    {
        return $this->morphMany(DatabaseNotification::class, 'notifiable')->orderBy('created_at', 'desc');
    }

}
