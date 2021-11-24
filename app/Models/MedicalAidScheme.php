<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalAidScheme extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function medicalAidPlans()
    {
        return $this->hasMany(MedicalAidPlan::class, 'med_aid_plan_id');
    }
}
