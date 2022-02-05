<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomChoiceOptionType extends Model
{
    use HasFactory;

    protected $table = 'custom_choice_option_types';

    protected $fillable = [
        'id',
        'name_en',
        'name_ar',
        'calories',
        'price',
        'custom_choice_option_id',
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
    public function custom_choice_option()
    {
        return $this->belongsTo(CustomChoiceOption::class, 'custom_choice_option_id', 'id');
    }
}
