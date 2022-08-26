<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'bio',
        'company',
        'profile_picture',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    // adding eager loading for all excuted queries
    /* protected $with = [
        'contacts',
        'companies'
    ]; */
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contacts()
    {
        # code...
        return $this->hasMany(Contact::class);
    }
    public function companies()
    {
        # code...
        return $this->hasMany(Company::class);
    }
    public function fullName()
    {
        # code...
        return $this->first_name . " " . $this->last_name;
    }

    public function ProfileUrl()
    {
        # code...
        if($this->profile_picture == null){
            return "http://via.placeholder.com/150x150";
        }
        if(Storage::exists($this->profile_picture)){
            return Storage::url($this->profile_picture);
        }
        return "http://via.placeholder.com/150x150";
    }
}
