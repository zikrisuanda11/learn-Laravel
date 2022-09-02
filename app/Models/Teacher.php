<?php

namespace App\Models;

use PhpParser\Builder\Class_;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory, HasApiTokens;

    protected $primaryKey = 'id_teacher';

    protected $guarded = ['id_teacher'];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function Course()
    {
        return $this->hasMany(Course::class, 'id_teacher', 'id_teacher');
    }

    public function Classroom()
    {
        return $this->hasMany(Classroom::class, 'id_teacher', 'id_teacher');
    }
}
