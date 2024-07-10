<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobgrade extends Model
{
    use HasFactory;
    protected $fillable = [
        'grade_level',
        'lowest_salary',
        'highest_salary',

    ];
}
