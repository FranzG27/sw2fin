<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'startDate',
        'endDate',
        'debt',
        'isCanceled',
        'id_loanFile',
    ];

}
