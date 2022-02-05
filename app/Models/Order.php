<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $guarded = [];

    public $timestamps = false;

    public function getStatusNameAttribute()
    {
        switch ($this->status) {
            case 0:
                return 'Pending';
            case 1:
                return 'Accepted';
            case 9:
                return 'Canceled';

            default:
                return 'undefined';
        }
    }
}
