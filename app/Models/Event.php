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
        'nbPlacesRester',
        'acceptation',
        'price',
        'id_categorie',
        'status',
        'user_id',
    ];
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

}
