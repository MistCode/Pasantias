<?php	
namespace App;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;	
use Illuminate\Notifications\Notifiable;	
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;	
use App\Notifications\UserResetPassword;
class User extends Authenticatable implements MustVerifyEmail
{	
    use Notifiable, HasRolesAndPermissions;	
    public function roles(){	
        return $this	
        ->belongsToMany('App\Role')	
        ->withTimestamps();	
    }
    public function sends()
    {
        return $this->hasMany('App\Send');
    }

    public function authorizeRoles($roles){	
        if($this->hasAnyRole($roles)){	
            return true;	
        }	
        abort(401, 'Esta acción no está autorizada');	
    }	
    public function hasAnyRole($roles){	
        if(is_array($roles)){	
            foreach ($roles as $role) {	
                if($this->hasRole($role)){	
                    return true;	
                }	
            }	
        } else {	
            if($this->hasRole($roles)){	
                return true;	
            }	
        }	
        return false;	
    }	
    public function hasRole($role){	
        if($this->roles()->where('name',$role)->first()){	
            return true;	
        }	
        return false;	
    }	
    /**	
     * The attributes that are mass assignable.	
     *	
     * @var array	
     */	
    protected $fillable = [	
        'name', 'email', 'password',	
    ];	
    /**	
     * The attributes that should be hidden for arrays.	
     *	
     * @var array	
     */	
    protected $hidden = [	
        'password', 'remember_token',	
    ];	
    /**	
     * The attributes that should be cast to native types.	
     *	
     * @var array	
     */	
    protected $casts = [	
        'email_verified_at' => 'datetime',	
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new Notifications\VerifyEmail);
    }
}