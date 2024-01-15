<?php

namespace App\Models;

use App\Models\Slot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        'province',
        'districts',
        'communes',
        'villages'
    ];

    public function scopeByOwner($query)
    {
        return $query->where('m_name', '!=', 'NULL');
    }

    //relationship
    public function slot()
    {
        return $this->hasOne(Slot::class, 'id_ven_machines');
    }
    public function villageRe()
    {
        return $this->belongsTo(Village::class, 'villages', 'id');
    }
    public function communeRe()
    {
        return $this->belongsTo(Commune::class, 'communes', 'id');
    }
    public function districtsRe()
    {
        return $this->belongsTo(District::class, 'districts', 'id');
    }
    public function provinceRe()
    {
        return $this->belongsTo(Province::class, 'province', 'id');
    }
}
