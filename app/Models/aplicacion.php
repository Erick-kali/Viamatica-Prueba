<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplicacion extends Model
{
    use HasFactory;

    // Especifica el nombre exacto de la tabla
    protected $table = 'Aplicacion';

    // Si la tabla no tiene los campos `created_at` y `updated_at`, desactívalo
    public $timestamps = false;

    // Define la clave primaria si no usa "id"
    protected $primaryKey = 'id_aplicacion';

    // Define los campos asignables
    protected $fillable = [
        'nombre_aplicacion',
        'descripcion',
        'url',
        'id_estado',
    ];
}
