<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $table = 'dishes';

    protected $fillable = [
        'id',
        'name_en',
        'name_ar',
        'ingredients',
        'calories',
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
    public function dishes_addons()
    {
        return $this->belongsToMany(DishAddon::class, 'dish_addon_pivot', 'dish_id', 'dishes_addons_id');
    }
    public function dishes_tags()
    {
        return $this->belongsToMany(DishTag::class, 'dish_tag_pivot', 'dish_id', 'dishes_tags_id');
    }
}
