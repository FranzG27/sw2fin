<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form2 extends Model
{
    use HasFactory;
    protected $fillable = [
        'alergia',
        'bloodDisease',
        'cambioPareja',
        'carcel',
        'chagas',
        'chagasFamiliar',
        'cold',
        'contagioEnfermedad',
        'convulsiones',
        'dental',
        'drogas',
        'embarazo',
        'estadoAnimo',
        'ets',
        'etsdisease',
        'fiebre',
        'heartDisease',
        'hepatitis',
        'id',
        'longTreatment',
        'malaria',
        'medicacion',
        'motivo',
        'motivoPrueba',
        'nuevo',
        'pulmon',
        'rechazadoS',
        'recentMedication',
        'sida',
        'sidaContagio',
        'sidaPrueba',
        'sifilis',
        'tatuaje',
        'tos',
        'transfusion',
        'vacuna',
        'vinchuca',
        'id_donor',
    ];
}
