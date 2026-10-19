<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\FeeStructure;
use App\Models\Payment;
use App\Models\Student;
use App\Services\MpesaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $query = Payment::with([
    'student',
    'feeStructure.course',
    'feeStructure.semester',
    'feeStructure.academicYear',
    'receivedBy',
]);

if ($request->filled('search')) {

    $search = $request->search;

    $query->whereHas('student', function ($studentQuery) use ($search) {

        $studentQuery->where('student_number', 'like', "%{$search}%")
            ->orWhere('first_name', 'like', "%{$search}%")
            ->orWhere('last_name', 'like', "%{$search}%");

    });
}

if ($request->filled('status')) {

    $query->where('status', $request->status);
}

if ($request->filled('payment_method')) {

    $query->where('payment_method', $request->payment_method);
}

$payments = $query
    ->latest()
    ->paginate(10)
    ->withQueryString();

    $totalCollected = Payment::where('status', 'completed')
        ->sum('amount');

    $thisMonth = Payment::where('status', 'completed')
        ->whereMonth('payment_date', now()->month)
        ->whereYear('payment_date', now()->year)
        ->sum('amount');

    $pendingMpesa = Payment::where('status', 'pending')
        ->where('payment_method', 'mpesa')
        ->sum('amount');

    return view('payments.index', compact(
        'payments',
        'totalCollected',
        'thisMonth',
        'pendingMpesa'
    ));
}
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $students = Student::where('status', 'active')
        ->orderBy('first_name')
        ->get();

    $feeStructures = FeeStructure::with([
        'course',
        'semester',
        'academicYear',
    ])
    ->latest()
    ->get();

    return view('payments.create', compact(
        'students',
        'feeStructures'
    ));
}

    /**
     * Store a newly created resource in storage.
     */
    
    
     public function store()
    {
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
{
   
    $payment->load([
        'student',
        'feeStructure.course',
        'feeStructure.semester',
        'feeStructure.academicYear',
        'receivedBy',
    ]);

    $totalFee = $payment->feeStructure->amount;

    $paidAmount = Payment::where('student_id', $payment->student_id)
        ->where('fee_structure_id', $payment->fee_structure_id)
        ->where('status', 'completed')
        ->sum('amount');

    $balance = max($totalFee - $paidAmount, 0);

    return view('payments.show', compact(
        'payment',
        'totalFee',
        'paidAmount',
        'balance'
    ));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



   
}
