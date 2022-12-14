<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, HasApiTokens;
    
    protected $primaryKey = 'id_student';

    protected $guarded = ['id_student'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function Parents()
    {
        return $this->hasMany(Parents::class, 'id_parent', 'id_parent');
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
