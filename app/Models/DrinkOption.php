<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrinkOption extends Model
{
    use HasFactory;

    protected $table = 'drinks_options';

    protected $fillable = [
        'id',
        'drink_id',
        'name_en',
        'name_ar',
        'price',
        'status',
        'created_by',
        'created_at',
    ];

    public $timestamps = false;

    /**
     * relations
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function drink()
    {
        return $this->belongsTo(Drink::class, 'drink_id', 'id');
    }
}
