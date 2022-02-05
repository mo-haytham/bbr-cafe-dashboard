<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use HasFactory;

    protected $table = 'drinks';

    protected $fillable = [
        'id',
        'name_en',
        'name_ar',
        'ingredients',
        'price',
        'status',
        'created_by',
        'created_at',
        'country_iso_code',
    ];

    public $timestamps = false;

    /**
     * relations
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function drink_options()
    {
        return $this->hasMany(DrinkOption::class, 'drink_id', 'id');
    }
}
