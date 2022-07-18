<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    //
    protected $fillable = [
        'transactions_id','products_id',
        'code','price','status_details','resi',
    ];

    public function product()
    {
        return $this->hasOne(Product::class,'id','products_id');
    }

    public function Transaction()
    {
        return $this->hasOne(Transaction::class,'id','transactions_id');
    }
}
