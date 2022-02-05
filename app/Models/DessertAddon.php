<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DessertAddon extends Model
{
    use HasFactory;

    protected $table = 'desserts_addons';

    protected $fillable = [
        'id',
        'name_en',
        'name_ar',
        'calories',
        'country_iso_code',
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
    public function desserts()
    {
        return $this->belongsToMany(Dessert::class, 'dessert_addon_pivot', 'desserts_addons_id', 'dessert_id');
    }
}
