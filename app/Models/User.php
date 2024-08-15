<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Fname',
        'Mname',
        'Lname',
        'class',
        'Role',
        'subject',
        'email',
        'password',
        'firstphonenumber',
        'secondphonenumber',
        'nameofschool',
        
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



    public function hasRole($role)
    {
        return $this->user()->where('Lname', $role)->exists();
    }


    public function standard_four_first_midterm(){

      return $this->hasmany(standard_four_first_midterm::class, 'id');
    }

    public function standard_four_semi_annual(){
    
        return $this->hasmany(standard_four__semi__annual::class, 'id');
        
    }

    public function standard_four_second_midterm(){

        return $this->hasmany(standard_four_second_midterm::class, 'id');
    }

  public function standard_four_annual(){
    
    return $this->hasmany(standard_four_annual::class, 'id');
        
    }



     public function standard_five_first_midterm(){

        return $this->hasmany(standard_five_first_midterm::class, 'id');
      }

      public function standard_five_second_midterm(){
    
        return $this->hasmany(standard_five_second_midterm::class, 'id');        
      }

      public function standard_five_semi_annual(){

        return $this->hasmany(standard_five_semi_annual::class, 'id');
      }

      public function standard_five_annual(){

        return $this->hasmany(standard_five_annual::class, 'id');
    }

    public function standard_six_first_midterm(){

      return $this->hasmany(standard_six_first_midterm::class, 'id');
    }

    public function standard_six_semi_annual(){

      return $this->hasmany(standard_six_semi_annual::class, 'id');
    }

    public function student_payment_fee(){

      return $this->hasmany(student_payment_fee::class);
    }

    public function message(){

      return $this->hasmany(message::class, 'id');
    }

  
    public function attendance()
    {
        return $this->hasMany(attendance::class, 'school_id'); 
    }
  
}
