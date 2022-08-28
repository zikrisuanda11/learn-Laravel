<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_grade';

    protected $guarded = 'id_grade';

    public function Course()
    {
        return $this->hasOne(Course::class, 'id_grade', 'id_grade');
    }

    public function Classroom()
    {
        return $this->hasMany(Classroom::class, 'id_grade', 'id_grade');
    }
}
