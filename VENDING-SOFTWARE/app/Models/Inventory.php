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
        'slot_num',
        'pro_id',
        'QTY',
        'id_sale_details'

    ];
    public function slots()
    {
        return $this->belongsTo(Slot::class, 'slot_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'pro_id', 'id');
    }
    public function saleDetail()
    {
        return $this->belongsTo(SaleDetail::class, 'id_sale_details', 'id');
    }
}
