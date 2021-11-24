<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suburb extends Model
{
    use HasFactory;

    public function main_members()
    {
        return $this->hasMany(MainMember::class);
    }

    public function street()
    {
        return $this->hasMany(Street::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function dependents()
    {
        return $this->hasMany(Dependent::class);
    }
    public function testRequests()
    {
        return $this->hasMany(TestRequest::class);
    }
    public function favourite()
    {
        return $this->belongsTo(Favourite::class);
    }
    public function requestlogs()
    {
        return $this->hasMany(RequestLog::class);
    }
}
