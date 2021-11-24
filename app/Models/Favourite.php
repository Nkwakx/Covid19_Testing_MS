<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = ['suburb_id', 'nurse_id'];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'PIVOT', 'nurse_id', 'suburb_id');
    }
    public function suburbs()
    {
        return $this->belongsToMany('App\Models\Suburb', 'PIVOT', 'nurse_id', 'suburb_id');
    }

}
