<?php

namespace App\Models;
use App\Models\Income_category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $table = 'tab_incomes';

    protected $fillable = [
        'id',
        'description',
        'id_vending_machine',
        'id_income_categories',
        'status',
    ];
    public function income_category()
    {
        return $this->belongsTo(Income_category::class, 'id_income_categories', 'id');
    }
    public function machine()
    {
        return $this->belongsTo(Machines::class, 'id_vending_machine', 'id');
    }
}
