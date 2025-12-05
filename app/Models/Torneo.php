<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Torneo extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente
     *
     * @var array
     */
    protected $fillable = [
        'juego_id',
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
    public function juego(){
        return $this->belongsTo(Juego::class, 'juego_id');
    }
}
