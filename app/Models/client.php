<?php

namespace App\Models;

use App\Models\traits\traitUsers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class client extends Model
{
    use HasFactory , traitUsers;
}
