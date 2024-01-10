<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income_category extends Model
{
    use HasFactory;
    protected $table = 'tab_income_categories';

    protected $fillable = [
        'id',
        'type',
        'price',
        'status'
    ];

    public function income(): HasMany
    {
        return $this->hasMany(Income::class);
    }
}
