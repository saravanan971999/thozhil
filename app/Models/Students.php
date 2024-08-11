<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table = "student";
    protected $fillable = [
        'first_name',
        'last_name',
        'email_id',
        'password',
        'phone',
        'dob',
        'age',
        'gender',
        'door_no',
        'street_name',
        'locality',
        'city',
        'distict',
        'state',
        'country',
        'pincode',
        'qualification',
        'degree',
        'major_subject',
        'graduating_year',
        'passed_out_year',
        'college_name',
        'college_state',
        'college_district',
        'resume',
        'username',
    ];

}
