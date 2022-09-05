<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parents extends Model
{
    use HasFactory, HasApiTokens;

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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function Student()
    {
        return $this->belongsTo(Student::class, 'id_parent', 'id_parent');
    }
}
