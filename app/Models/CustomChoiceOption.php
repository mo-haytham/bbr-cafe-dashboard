<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomChoiceOption extends Model
{
    use HasFactory;

    protected $table = 'custom_choice_options';

    protected $fillable = [
        'id',
        'custom_choice_id',
        'is_required',
        'name_en',
        'name_ar',
        'max_choices',
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
    public function custom_choice()
    {
        return $this->belongsTo(CustomChoice::class, 'custom_choice_id', 'id');
    }
    public function custom_choice_option_types()
    {
        return $this->hasMany(CustomChoiceOptionType::class, 'custom_choice_option_id', 'id');
    }
}
