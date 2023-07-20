<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'isAccepted',
        'id_donor',
        'id_form1',
        'id_form2',
    ];

    public function form1()
    {
        return $this->belongsTo(Form1::class);
    }

    public function form2()
    {
        return $this->belongsTo(Form2::class);
    }

}
