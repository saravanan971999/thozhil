<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    use HasFactory;
    protected $table = "tests";
    protected $primaryKey = "test_id";
    protected $fillable = [
        'quiz_id','conducting_datetime','student_id',
        'status','application_id','percentage','test_missed'];

        protected $dates = ['conducting_datetime'];
}
