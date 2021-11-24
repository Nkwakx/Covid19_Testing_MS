<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestLog extends Model
{
    use HasFactory;
    protected $dates = ['log_date'];
    protected $guarded=[];

    public function setLogDateAttribute($value){
        $this->attributes['log_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function testRequest()
    {
        return $this->belongsTo(TestRequest::class, 'request_id');
    }
    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class, 'log_time');
    }
    public function suburb()
    {
        return $this->belongsTo(Suburb::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'nurse_id');
    }
    // public function approvedBy(User $user)
    // {
    //     return $this->requestlogs->whereHas('user_id', $user->id);
    // }
}
