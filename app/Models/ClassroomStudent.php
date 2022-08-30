<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomStudent extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_classroom_student';

    protected $guarded = ['id_classroom_student'];
}
