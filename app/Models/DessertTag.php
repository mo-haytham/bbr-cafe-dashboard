<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DessertTag extends Model
{
    use HasFactory;

    protected $table = 'desserts_tags';

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
    public function desserts()
    {
        return $this->belongsToMany(Dessert::class, 'dessert_tag_pivot', 'desserts_tags_id', 'dessert_id');
    }
}
