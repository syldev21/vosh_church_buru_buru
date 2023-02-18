<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CellGroup extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'pastor_id', 'estate_id'];
}
