<?php

namespace App;

use App\str_slug;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','roles','username','owner_phone','owner_address','store_name','store_phone','store_address','gender','store_status','maps_store','ktp_photo','selfie_photo','logo_store','slug'
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

    
    public function setStoreNameAttribute($value)
    {
        $this->attributes['store_name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    
}
