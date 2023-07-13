<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'isAccepted',
        'id_donor',
        'id_type',
        'id_returnFile',
        //'id_Inventory',
    ];

}
