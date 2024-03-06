<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'date',
        'lieu',
        'photo',
        'nbPlaces',
        'acceptation',
        'id_categorie',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }
}
