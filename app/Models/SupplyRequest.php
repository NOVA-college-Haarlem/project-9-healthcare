<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplyRequest extends Model
{
    protected $fillable = [
        'staff_id',
        'item_id',
        'quantity',
        'status',
        'reason'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function inventoryItem()
    {
        return $this->belongsTo(InventoryItem::class, 'item_id');
    }
}
