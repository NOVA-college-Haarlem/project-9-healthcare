<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    protected $fillable = [
        'name',
        'category',
        'quantity',
        'location',
        'threshold'
    ];

    public function supplyRequests()
    {
        return $this->hasMany(SupplyRequest::class, 'item_id');
    }
}
