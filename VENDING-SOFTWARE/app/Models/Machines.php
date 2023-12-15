<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machines extends Model
{
    use HasFactory;
    protected $table = 'tab_vending_machines';

    protected $fillable = [
        'm_name',
        'address',
    ];
}
