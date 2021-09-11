<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';

    protected $fillable = [
        'name',
        'email',
        'faculty',
        'batch_id',
        'faculty_id',
        'password',
        'phone',
        'status'
    ];
    public function BatchId(){
        return$this->belongsTo(Batch::class,'batch_id');
    }
    public function FacultyID(){
        return$this->belongsTo(Faculty::class,'faculty_id');
    }
}
