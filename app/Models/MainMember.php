<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMember extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','idNo', 'phone','surname','gender', 'addressLine1', 'addressLine2',
    'med_aid_number',
    'med_aid_YN',
    'med_aid_plan_id',
    'suburb_id',
    'main_member_id'
];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function medicalAidPlan()
    {
        return $this->belongsTo(MedicalAidPlan::class, 'med_aid_plan_id');
    }
    public function suburb()
    {
        return $this->belongsTo(Suburb::class, 'suburb_id');
    }
}
