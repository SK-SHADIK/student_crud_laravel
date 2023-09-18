<?php

namespace App\Models\UMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';

    const CREATED_AT = 'cd';
    const UPDATED_AT = 'ud';
}
