<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BioData extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dob',
        'nationality',
        'mobile_number',
        'bio',
        'user_id',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public $rules = [
        'dob'=> ['required', 'date', 'date_format:Y-m-d', 'before:today'],
        "nationality" => 'required|string|max:200',
        "mobile_number" => 'required|string|max:100',
        "bio" => 'string|max:10000',
        "user_id" => 'required|integer|exists:users,id'
    ];
}
