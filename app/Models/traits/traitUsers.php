<?php

namespace App\Models\traits;

use App\Models\User;

trait traitUsers
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
