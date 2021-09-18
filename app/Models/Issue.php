<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transactions';

    protected $fillable = ['student_id','user_id','book_id','batch_id','return_date','issue_date','renew_data','status','Book_return_on'];

    public function StudentId(){
        return$this->belongsTo(Student::class,'student_id');
    }
    public function BookId(){
        return$this->belongsTo(Book::class,'book_id');
    }
    public function BatchId(){
        return$this->belongsTo(Batch::class,'batch_id');
    }
}
