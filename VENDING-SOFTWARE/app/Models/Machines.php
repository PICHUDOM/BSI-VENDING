<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Machines extends Model
{
    use HasFactory;
    protected $table = 'tab_vending_machines';

    protected $fillable = [
        'm_name',
        'address',
        'installation_date',
        'expiry_date',
        'm_image',
        'slot',
        // 'commune',
        // 'village',
        // 'province',
        // 'district'
    ];

    public function scopeByOwner($query)
    {
        return $query->where('m_name', '!=', 'NULL');
    }
}
