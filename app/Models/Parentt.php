<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentt extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_parent';

    protected $guarded = 'id_parent';

    public function Student()
    {
        return $this->belongsTo(Student::class, 'id_parent', 'id_parent');
    }
}
