<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'tab_products';

    protected $fillable = [
        'id',
        'p_image',
        'p_name',
        'expiry_date',
        'specific_code',
        'id_pro_categories'
    ];
    public function pro_category()
    {
        return $this->belongsTo(Pro_category::class, 'id_pro_categories', 'id');
    }
}
