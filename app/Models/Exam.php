<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_exam';

    protected $guarded = ['id_exam'];

    public function ExamType()
    {
        return $this->belongsTo(ExamType::class, 'id_exam_type', 'id_exam_type');
    }

    public function ExamResult()
    {
        return $this->hasMany(ExamResult::class);
    }
}
