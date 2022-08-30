<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_student';

    protected $guarded = ['id_student'];

    public function Parentt()
    {
        return $this->hasMany(Parentt::class, 'id_parent', 'id_parent');
    }

    public function Attendance()
    {
        return $this->hasMany(Attendance::class, 'id_student', 'id_student');
    }

    public function ExamResult()
    {
        return $this->hasMany(ExamResult::class);
    }

    public function Clasrooms()
    {
        return $this->belongsToMany(Clasrooms::class);
    }
}
