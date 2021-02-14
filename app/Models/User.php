<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
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


    public static function messages(){
        return [
            'fname.required' => 'The First Name is Required',
            'lname.required' => 'The Last Name is Required',
            'email.required' => 'The Email is Required',
            'password.required' => 'The Password is Required',
        ];
    }

    // public function setPasswordAttribute($password){
    //     $this->attributes['password'] = Hash::make($password);
    // }

    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }

    //check if the has a role
    public function hasAnyRole(string $role){
        return null !== $this->roles()->where('name',$role)->first();
    }

    //check if the user has any given role
    public function hasAnyRoles(array $role){
        return null !== $this->roles()->whereIn('name',$role)->first();
    }

}
