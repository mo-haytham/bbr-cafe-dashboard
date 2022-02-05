<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishAddon extends Model
{
    use HasFactory;

    protected $table = 'dishes_addons';

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
    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'dish_addon_pivot', 'dishes_addons_id', 'dish_id');
    }
}
