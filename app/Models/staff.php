<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class staff extends Authenticatable implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use HasFactory, Authorizable, CanResetPassword;

    // Define custom attributes or functionality if needed
    protected $table = 'staff';


    protected $fillable = [
        'staffFname',
        'staffMname',
        'staffLname',
        'staffDateofBirth',
        'staffPlaceofBirth',
        'staffNationality',
        'staffRegion',
        'staffDistrict',
        'staffCurrentresidence',
        'staffPreviousSchool',
        'staffnameofschool',
        'email',
        'class',
        'staffRole',
        'password',
        'school_id', // Fix capitalization to 'password'
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
   protected $hidden = [
       'password',
       'remember_token',
   ];

   /**
    * The attributes that should be cast.
    *
    * @var array<string, string>
    */
   protected $casts = [
       'email_verified_at' => 'datetime',
       'password' => 'hashed',
   ];

    
    /**
     * Relationship with subjects table using a pivot table teacher_subject.
     */
    // public function subjects()
    // {
    //     return $this->belongsToMany(s/ubject::class, 'teacher_subject');
    // }

    /**
     * Relationship with results table.
     */
    public function results()
    {
        return $this->hasMany(results::class);
    }

    public function teacherSubjects()
    {
        return $this->hasMany(TeacherSubject::class, 'staff_id', 'id');
    }

    // Relationship with the Subject model through teacher_subject table
    public function subjects()
    {
        return $this->belongsToMany(subjects::class, 'teacher_subject', 'staff_id', 'subjects_id');
    }

    // Relationship with the Schoolinformation model
    public function school()
    {
        return $this->belongsTo(Schoolinformation::class, 'school_id', 'id');
    }

    // Relationship with users (students) for the same class
    public function students()
    {
        return $this->hasMany(User::class, 'class', 'class')
                    ->where('school_id', $this->school_id);
    }

    
    public function sentMessages()
    {
        return $this->hasMany(messages::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(messages::class, 'receiver_id');
    }
}
