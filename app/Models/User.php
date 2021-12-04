<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Notifications\Auth\PasswordResetNotification;
use App\Models\Agency;
use App\Models\Campaign;
use App\Models\Script;
use App\Models\Suggestion;

class User extends Authenticatable implements MustVerifyEmail, JWTSubject 
{
    use HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'api';
    
    protected $guarded = [];

    public $oneItem = UserResource::class;
    public $allItems = UserCollection::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }

    public function agencies()
    {
        return $this->hasMany(Agency::class, 'user_id');
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function scripts()
    {
        return $this->hasMany(Script::class);
    }

    public function suggestions()
    {
        return $this->hasMany(Suggesstion::class);
    }

    public function resellers()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    public function plans()
    {
    	return $this->belongsToMany(Plan::class, 'user_plans');
    }
}
