<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'id',
        'branch_id',
        'name',
        'mobile',
        'number_of_guests',
        'date',
        'time',
        'occasion',
        'ip_address',
        'created_at',
        'status',
        'accepted_by',
        'accepted_at'
    ];

    public $timestamps = false;

    /**
     * relations
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'accepted_by', 'id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
