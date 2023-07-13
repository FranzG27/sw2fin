<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'accidentDate',
        'nameHospital',
        'nameDoctor',
        'description',
        'quantity',
        'id_applicant',
        'id_status',
    ];
}
