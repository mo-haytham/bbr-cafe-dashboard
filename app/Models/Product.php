<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'image',
        'name_en',
        'name_ar',
        'price',
        'description_en',
        'description_ar',
        'status',
        'country_iso_code',
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
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_iso_code', 'country_iso_code');
    }
}
