<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalAidPlan extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function medicalAidScheme()
    {
        return $this->belongsTo(MedicalAidScheme::class, 'medical_aid_scheme_id');
    }
    public function main_members()
    {
        return $this->hasMany(User::class);
    }

}
