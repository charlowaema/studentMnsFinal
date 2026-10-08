<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'name',
    ];
    /**
     * A semester can have many enrollments.
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    /**
     * A semester can have many fee structures.
     */
    public function feeStructures()
    {
        return $this->hasMany(FeeStructure::class);
    }
}
