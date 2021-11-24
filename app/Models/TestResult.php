<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_result',
        'temperature',
        'blood_pressure',
        'oxygen_levels',
        'request_id',
        'patient_id',
        'nurse_id',
    ];
}
