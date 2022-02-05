<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = [
        'id',
        'name_en',
        'name_ar',
        'country_iso_code',
        'is_default',
        'info',
        'opening_schedule',
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
    public function tables()
    {
        return $this->hasMany(Table::class, 'branch_id', 'id');
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'branch_id', 'id');
    }
}
