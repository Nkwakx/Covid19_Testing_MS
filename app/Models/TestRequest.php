<?php

namespace App\Models;

use App\Models\User;
use App\Models\Suburb;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['addressLine1', 'addressLine2','suburb_id', 'requestor_id','number_of_patient','status', 'test_Subject_Id'];

    // protected $casts = [
    //     'testSubject_id' => 'array',
    //   ];

      public function user()
      {
          return $this->belongsTo(User::class, 'requestor_id');
      }
      public function suburb()
      {
          return $this->belongsTo(Suburb::class);
      }
      public function requestlogs()
      {
          return $this->hasMany(RequestLog::class);
      }
      public function dependents()
      {
          return $this->belongsTo(Dependent::class, 'test_Subject_Id');
      }
}
