<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryManager extends Model
{
    protected $fillable = ['staff_id'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
