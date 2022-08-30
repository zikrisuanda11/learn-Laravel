<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_classroom';

    protected $guarded = ['id_classroom'];

    public function Grade()
    {
        return $this->belongsTo(Grade::class, 'id_grade', 'id_grade');
    }

    public function Teacher()
    {
        return $this->belongsTo(Teacher::class, 'id_teacher', 'id_teacher');
    }

    public function Students()
    {
        return $this->belongsToMany(Student::class);
    }

}
