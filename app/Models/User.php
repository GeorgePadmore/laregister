<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
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
    ];

    /**
     * Login Validation rules
     *
     * @var array
     */
    public $login_rules = [
        'username' => ['required', 'string'],
        'password' => ['required', 'string']
    ];

    /**
     * Registration Validation rules
     *
     * @var array
     */
    public $rules = [
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'regex:/(^[A-Za-z0-9]+$)+/', 'max:100', 'unique:users'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'regex:/^(?=.{6,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/'],
        'dob'=> ['required', 'date', 'before:today'],
        "nationality" => 'required|string|max:200',
        "mobile_number" => 'required|string|max:100',
        "bio" => 'string|max:10000'
    ];

    public $customMessages = [
        'required' => 'The :attribute field is required.',
        'username.regex' => 'The username can only allow numbers and alphabets. Kindly check and try again',
        'password.regex' => 'The provided password must contain at least 1 uppercase letter, 1 lowercase letter, 1 symbol and 1 number with a minimum length of 6 characters.'
    ];
}
