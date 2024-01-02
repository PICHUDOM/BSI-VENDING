<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    protected $table = 'tab_slots';

    protected $fillable = [
        'type',
        'quantity',
        'id_ven_machines',
        'status',
    ];
    //relathionshi[]
    public function machine()
    {
        return $this->belongsTo(Machines::class, 'id_ven_machines');
    }
}
