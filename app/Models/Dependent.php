<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dependent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'idNo',
        'phone',
        'email_address',
        'addressLine1',
        'addressLine2',
        'suburb_id',
        'gender',
        'same_address',
        'med_aid_YN',
        'med_aid_plan_id',
        'main_member_id'
    ];

    public function users()
    {
        $id = Auth::user()->id;
        return $this->belongsTo(User::class, 'id', 'main_member_id')->where('id', $id);
    }
    public function suburb()
    {
        return $this->belongsTo(Suburb::class);
    }
    // public function test_requests()
    // {
    //     return $this->hasMany(TestRequest::class, 'dependent_test_request', 'dependent_test_request', 'test_request_id','test_subject_id');
    // }
    public function testRequest()
    {
        return $this->hasMany(TestRequest::class);
    }
}
