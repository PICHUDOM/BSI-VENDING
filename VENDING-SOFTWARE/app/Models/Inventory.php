<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'tab_pro_slot';

    protected $fillable = [
        'slot_id',
        'pro_id',
        'product_id',
        'QTY'

    ];
    public function slots()
    {
        return $this->belongsTo(Slot::class, 'slot_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
