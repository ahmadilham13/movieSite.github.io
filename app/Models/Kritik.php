<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kritik extends Model
{
    use HasFactory;

    protected $table = 'kritik';
    protected $guarded = ['id'];

    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
