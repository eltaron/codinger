<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'father_name',
        'mother_name',
        'email',
        'phone',
        'parent_phone',
        'school_name',
        'national_id_number'
    ];


}