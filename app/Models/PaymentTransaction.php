<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    protected $fillable = [
        'bill_id',
        'amount',
        'payment_date',
        'payment_method',
        'transaction_id'
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
