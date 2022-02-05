<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'status',
        'created_by',
        'updated_at',
        'created_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * relations
     */
    public function branches()
    {
        return $this->hasMany(Branch::class, 'created_by', 'id');
    }
    public function countries()
    {
        return $this->hasMany(Country::class, 'created_by', 'id');
    }
    public function custom_choices()
    {
        return $this->hasMany(CustomChoice::class, 'created_by', 'id');
    }
    public function custom_choice_options()
    {
        return $this->hasMany(CustomChoiceOption::class, 'created_by', 'id');
    }
    public function custom_choice_option_types()
    {
        return $this->hasMany(CustomChoiceOptionType::class, 'created_by', 'id');
    }
    public function desserts()
    {
        return $this->hasMany(Dessert::class, 'created_by', 'id');
    }
    public function desserts_addons()
    {
        return $this->hasMany(DessertAddon::class, 'created_by', 'id');
    }
    public function desserts_tags()
    {
        return $this->hasMany(DessertTag::class, 'created_by', 'id');
    }
    public function dishes()
    {
        return $this->hasMany(Dish::class, 'created_by', 'id');
    }
    public function dishes_addons()
    {
        return $this->hasMany(DishAddon::class, 'created_by', 'id');
    }
    public function dishes_tags()
    {
        return $this->hasMany(DishTag::class, 'created_by', 'id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'created_by', 'id');
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'accepted_by', 'id');
    }
    public function tables()
    {
        return $this->hasMany(Table::class, 'created_by', 'id');
    }
    public function drinks()
    {
        return $this->hasMany(Drink::class, 'created_by', 'id');
    }
    public function drink_options()
    {
        return $this->hasMany(DrinkOption::class, 'created_by', 'id');
    }
}
