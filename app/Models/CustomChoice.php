<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomChoice extends Model
{
    use HasFactory;

    protected $table = 'custom_choices';

    protected $fillable = [
        'id',
        'country_iso_code',
        'name_en',
        'name_ar',
        'description',
        'base_price',
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
    public function custom_choice_options()
    {
        return $this->hasMany(CustomChoiceOption::class, 'custom_choice_id', 'id');
    }
}
