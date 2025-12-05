<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Juego extends Model{
    use HasFactory;

    protected $table = 'juegos';

    protected $fillable = ['nombre'];
    public function torneos():HasMany{
        return $this->hasMany(Torneo::class, 'juego_id');
    }
}
