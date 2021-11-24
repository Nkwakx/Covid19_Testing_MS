<?php

namespace App\Models;

use App\Models\MedicalAidPlan;
use App\Models\MedicalAidScheme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable =[
        'pay_question',
        'medicalAid_No',
        'medical_aid_plans_id',
        'user_id',
        'dependent_id',
        'medical_aid_scheme_id',
    ];

    public function medicalAidPlan()
    {
        return $this->belongsTo(MedicalAidPlan::class, 'medical_aid_plans_id');
    }
    public function medicalAidScheme()
    {
        return $this->belongsTo(MedicalAidScheme::class);
    }
}
