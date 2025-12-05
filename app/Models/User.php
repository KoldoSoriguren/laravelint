<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{   
    protected $table = 'users';
    protected $fillable = [
        'usuario',
        'contrasena',
    ];
    public function torneos(): BelongsToMany{
        return $this->belongsToMany(Torneo::class, 'users_torneos', 'user_id', 'torneo_id')->withTimestamps();
    }
    
    
}
