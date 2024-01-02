<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'tab_location';

    protected $fillable = [
        'id',
        'location_name',
        'latitude',
        'logtitude'
    ];

}
