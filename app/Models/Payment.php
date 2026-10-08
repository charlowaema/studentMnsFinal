<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
        protected $fillable = [
        'student_id',
        'fee_structure_id',
        'amount',
        'payment_method',
        'transaction_reference',
        'payment_date',
        'received_by',
    ];

     protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'payment_date' => 'date',
        ];
    }

    public function students(){
        return $this->belongsTo(Student::class);
    }

    public function feeStructure(){
        return $this->belongsTo(Payment::class);
    }
    public function receivedBy(){
        return $this->belongsTo(User::class, 'received_by');
    }
}
