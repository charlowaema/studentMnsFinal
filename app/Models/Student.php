<?php

namespace App\Models;

use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=[    //this specifies the columns so be populated with data
        'student_number',
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'phone_no',
        'email',
        'address',
        'status',
    ];

//define the relationships between the students table and the othe tables that are relatable
//payments
//enrollements

   protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
        ];
    }

public function payments(){
    return $this->hasMany(Payment::class);
}

public function enrollments(){
    return $this->hasMany(Enrollment::class);
}

}
