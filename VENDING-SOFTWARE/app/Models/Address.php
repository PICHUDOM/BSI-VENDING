<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'op_provinces';

    protected $fillable = [
        'id',
        'name'
    ];
    public function districts()
    {
        return $this->hasMany(Districts::class, 'provinces_id');
    }

    public function scopeByProvince($query, $provinceId)
    {
        return $query->where('id', $provinceId);
    }
}
