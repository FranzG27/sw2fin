<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form1 extends Model
{
    use HasFactory;
    //protected $primaryKey = 'form1_id'; 

    protected $fillable = [
        'ci',
        'departamento',
        'domicilio',
        'edad',
        'email',
        'estadoCivil',
        'fecha',
        'gradoInstruccion',
        //'hora',
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

    // Make fields nullable
    protected $casts = [
        'ci' => 'string',
        'departamento' => 'string',
        'domicilio' => 'string',
        'edad' => 'integer',
        'email' => 'string',
        'estadoCivil' => 'string',
        'fecha' => 'date',
        'gradoInstruccion' => 'string',
        //'hora' => 'time',
        'id' => 'integer',
        'lugarTrabajo' => 'string',
        'fechaNacimiento' => 'date',
        'nombreCompleto' => 'string',
        'ocupacion' => 'string',
        'procendencia' => 'string',
        'profesion' => 'string',
        'sexo' => 'string',
        'telefono' => 'string',
        'telefonoEmergencia' => 'string',
        'tipoDonacion' => 'string',
        'zona' => 'string',
    ];
    
    public function medicalRecord()
    {
        return $this->hasOne(MedicalRecord::class, 'form1_id');
    }
}
