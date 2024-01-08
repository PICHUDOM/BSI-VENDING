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
        'slot'

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
}
