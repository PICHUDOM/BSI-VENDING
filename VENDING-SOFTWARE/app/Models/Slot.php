<?php

namespace App\Models;

use App\Models\Inventory;
use App\Models\Machines;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Slot extends Model
{
    use HasFactory;
    protected $table = 'tab_slots';

    protected $fillable = [
        'quantity',
        'id_ven_machines',
        'product_id',

    ];
    //relathionshi[]
    public function machine()
    {
        return $this->belongsTo(Machines::class, 'id_ven_machines');
    }
    public function productRe()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }
}
