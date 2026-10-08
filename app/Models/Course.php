<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_code',
        'course_name',
        'description',
        'duration',
        'status',
    ];
    /**
     * A course can have many enrollments.
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    /**
     * A course can have many fee structures.
     */
    public function feeStructures()
    {
        return $this->hasMany(FeeStructure::class);
    }
}
