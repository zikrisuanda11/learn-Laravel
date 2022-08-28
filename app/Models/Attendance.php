<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'id_student',
        'status',
        'remark'
    ];

    public function Student()
    {
        return $this->belongsTo(Student::class, 'id_student', 'id_student');
    }
}
