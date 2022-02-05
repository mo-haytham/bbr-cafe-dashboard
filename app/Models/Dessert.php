<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dessert extends Model
{
    use HasFactory;

    protected $table = 'desserts';

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
    public function desserts_addons()
    {
        return $this->belongsToMany(DessertAddon::class, 'dessert_addon_pivot', 'dessert_id', 'desserts_addons_id');
    }
    public function desserts_tags()
    {
        return $this->belongsToMany(DessertTag::class, 'dessert_tag_pivot', 'dessert_id', 'desserts_tags_id');
    }
}
