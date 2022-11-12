<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'film';
    protected $guarded = ['id'];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
    // public function cast()
    // {
    //     return $this->belongsTo(Cast::class, 'cast_id');
    // }
    public function kritik()
    {
        return $this->hasMany(Kritik::class, 'film_id');
    }
    public function peran()
    {
        return $this->hasMany(Peran::class, 'film_id');
    }
}
