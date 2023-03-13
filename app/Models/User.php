<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'picture',
        'gender',
        'dob',
        'phone',
        'marital_status_id',
        'estate_id',
        'cell_group_id',
        'employment_status_id',
        'born_again_id',
        'leadership_status_id',
        'ministry_id',
        'occupation_id',
        'education_level_id',
        'password',
        'token',
        'token_expire',
    ];
}
