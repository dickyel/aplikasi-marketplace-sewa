<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    //
    protected $fillable = [
        'full_name','users_id','phone_number','address',
        'code','total_price','booking_first','booking_last','ktp_photo','selfie_photo','day_total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id','id');
    }


    
}
