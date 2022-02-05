<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishTag extends Model
{
    use HasFactory;

    protected $table = 'dishes_tags';

    protected $fillable = [
        'id',
        'name_en',
        'name_ar',
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
        return $this->belongsToMany(Dish::class, 'dish_tag_pivot', 'dishes_tags_id', 'dish_id');
    }
}
