<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente
     *
     * @var array
     */
    protected $fillable = [
        'juego',
        'titulo',
        'plazas',
        'estado',      // "abierto" o "cerrado"
        'descripcion',
    ];

    /**
     * Los atributos que se deben castear a tipos específicos
     *
     * @var array
     */
    protected $casts = [
        'plazas' => 'integer',
        'estado' => 'boolean', // true para "abierto", false para "cerrado"
    ];
}
