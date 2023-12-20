<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;
    protected $table = 'op_districts';
    protected $fillable = [
        'id',
        'name',
        'provinces_id'
    ];

    public function province()
    {
        return $this->belongsTo(Address::class, 'provinces_id');
    }

    public function scopeByDistrict($query, $value)
    {
        return $query->where('provinces_id', $value);
    }
}
