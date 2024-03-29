<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'user_id',
        'event_id',
        'status',

    ];
    public function event()
    {
        return $this->belongsTo(event::class, 'event_id');
    }
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}
