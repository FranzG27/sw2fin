<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form2 extends Model
{
    use HasFactory;
    //protected $primaryKey = 'form2_id';
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
    ];

    // Make fields nullable
    protected $casts = [
        'alergia' => 'boolean',
        'bloodDisease' => 'boolean',
        'cambioPareja' => 'boolean',
        'carcel' => 'boolean',
        'chagas' => 'boolean',
        'chagasFamiliar' => 'boolean',
        'cold' => 'boolean',
        'contagioEnfermedad' => 'boolean',
        'convulsiones' => 'boolean',
        'dental' => 'boolean',
        'drogas' => 'boolean',
        'embarazo' => 'boolean',
        'estadoAnimo' => 'boolean',
        'ets' => 'boolean',
        'etsdisease' => 'string',
        'fiebre' => 'boolean',
        'heartDisease' => 'boolean',
        'hepatitis' => 'boolean',
        'id' => 'integer',
        'longTreatment' => 'boolean',
        'malaria' => 'boolean',
        'medicacion' => 'boolean',
        'motivo' => 'string',
        'motivoPrueba' => 'boolean',
        'nuevo' => 'boolean',
        'pulmon' => 'boolean',
        'rechazadoS' => 'boolean',
        'recentMedication' => 'boolean',
        'sida' => 'boolean',
        'sidaContagio' => 'boolean',
        'sidaPrueba' => 'boolean',
        'sifilis' => 'boolean',
        'tatuaje' => 'boolean',
        'tos' => 'boolean',
        'transfusion' => 'boolean',
        'vacuna' => 'boolean',
        'vinchuca' => 'boolean',
    ];
    public function medicalRecord()
    {
        return $this->hasOne(MedicalRecord::class, 'form2_id');
    }
}
