<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_parent';

    protected $fillable = [
        'email',
        'password',
        'fname',
        'lname',
        'date_of_birth',
        'phone',
        'status'
    ];

    public function Student()
    {
        return $this->belongsTo(Student::class, 'id_parent', 'id_parent');
    }
}
