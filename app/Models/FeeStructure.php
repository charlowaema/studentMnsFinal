<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
 protected $table = 'fees_structures';

    protected $fillable = [
        'course_id',
        'semester_id',
        'academic_year__id',
        'amount',
    ];
     protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
        ];
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }

     public function semester(){
        return $this->belongsTo(Semester::class);
    }
    public function academicYear(){
        return $this->belongsTo(Semester::class, 'academic_year__id');
    }

     public function payments(){
        return $this->hasMany(Payment::class, 'fee_structure_id');
    }

}
