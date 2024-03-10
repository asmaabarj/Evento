<?php

namespace App\Models;

use App\Models\traits\traitUsers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class client extends Model
{
    use HasFactory, traitUsers , SoftDeletes;

    protected $fillable = ['user_id'];
}
