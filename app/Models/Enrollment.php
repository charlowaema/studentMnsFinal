<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
     protected $fillable = [
        'student_id',
        'course_id',
        'semester_id',
        'academic_year_id',
    ];
    /**
     * An enrollment belongs to one student.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    /**
     * An enrollment belongs to one course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    /**
     * An enrollment belongs to one semester.
     */
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
    /**
     * An enrollment belongs to one academic year.
     */
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
