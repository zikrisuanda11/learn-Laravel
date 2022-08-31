<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_exam_type';

    protected $guarded = ['id_exam_type'];

    public function Exam()
    {
        return $this->hasMany(Exam::class);
    }
}
