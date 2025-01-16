<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;

    protected $table = 'catalogo'; // Nombre de la tabla en la base de datos

    protected $fillable = ['tipo_catalogo', 'descripcion', 'usuario_creacion', 'fecha_creacion', 'usuario_modificacion', 'fecha_modificacion', 'usuario_eliminacion', 'fecha_eliminacion']; //campos de la tabla rol
}
