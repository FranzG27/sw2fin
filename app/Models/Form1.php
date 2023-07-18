<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'ci',
        'departamento',
        'domicilio',
        'edad',
        'email',
        'estadoCivil',
        'fecha',
        'gradoInstruccion',
        'hora',
        'id',
        'lugarTrabajo',
        'fechaNacimiento',
        'nombreCompleto',
        'ocupacion',
        'procendencia',
        'profesion',
        'sexo',
        'telefono',
        'telefonoEmergencia',
        'tipoDonacion',
        'zona'
    ];
}
