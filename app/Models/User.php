<?php

namespace App\Models;


use App\Models\Suburb;
use App\Models\Dependent;
use App\Models\TestRequest;
use App\Models\SecurityQuestions;
use App\Providers\UserCreatedEvent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email','password',
    'security_question_id','security_answer', 'status', 'user_type', 'name', 'surname'
    ];


    protected $dispatchesEvents = [
        'created' =>UserCreatedEvent::class,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
    public function suburb()
    {
        return $this->belongsTo(Suburb::class, 'suburb_id');
    }
    /**
     * Check if the user has a role
     * @param string $role
     * $return bool
     */
    public function hasAnyRole(string $role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     * Check if the user has any given role
     * @param array $role
     * $return bool
     */

    public function hasAnyRoles(array $role)
    {
        return null !== $this->roles()->whereIn('name', $role)->first();
    }
    public function securityQuestion()
    {
        return $this->belongsTo(SecurityQuestions::class, 'security_question_id');
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

    public function lab_users()
    {
        return $this->hasOne(LabUser::class, 'lab_user_id');
    }
    public function nurses()
    {
        return $this->hasOne(Nurse::class, 'nurse_id');
    }
    public function main_members()
    {
        return $this->hasOne(MainMember::class, 'main_member_id');
    }
}
