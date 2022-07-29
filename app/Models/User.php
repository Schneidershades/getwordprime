<?php

namespace App\Models;

use App\Models\Plan;
use App\Models\FavoriteScript;
use App\Models\FlaggedScript;
use App\Models\Agency;
use App\Models\Script;
use App\Models\Campaign;
use App\Models\Suggestion;
use App\Models\PlatformIntegration;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use App\Notifications\Auth\PasswordResetNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'first_name',
        'last_name',
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
        return $this->hasMany(Suggestion::class);
    }

    public function resellers()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    public function plans()
    {
    	return $this->belongsToMany(Plan::class, 'user_plans');
    }

    public function platformIntegrations()
    {
        return $this->hasMany(PlatformIntegration::class);
    }

    public function favorites()
    {
        return $this->hasMany(FavoriteFlagResponse::class)->where('type', 'favorite');
    }

    public function flags()
    {
        return $this->hasMany(FavoriteFlagResponse::class)->where('type', 'flag');
    }

    public function scriptsResponses()
    {
        return $this->hasMany(ScriptResponse::class);
    }

    public function presets()
    {
        return $this->hasMany(UserScriptTypePreset::class);
    }

    public function favoriteScripts()
    {
        return $this->hasMany(FavoriteScript::class);
    }

    public function flaggedScripts()
    {
        return $this->hasMany(FlaggedScript::class);
    }

    public function freelancerAds()
    {
        return $this->hasMany(FreelancerAd::class);
    }

    public function savedProjects()
    {
        return $this->hasMany(SavedProject::class, 'user_id');
    }

    public function languages()
    {
        return $this->hasMany(UserScriptTypeLanguage::class);
    }

    public function tone()
    {
        return $this->hasMany(UserScriptTypeTone::class);
    }

    public function marketplaceProjects()
    {
        return $this->hasMany(MarketplaceProject::class);
    }

    public function agencyCampaigns()
    {
        return $this->hasMany(AgencyCampaign::class);
    }
}
