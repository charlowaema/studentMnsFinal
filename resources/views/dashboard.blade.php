@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <h1 class="mb-4">
        Dashboard
    </h1>

    <div class="alert alert-primary">
        Welcome to the Student Management System.
    </div>

    <div class="row">

        {{-- Total Students --}}
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card shadow-sm border-0 h-100 dashboard-card card-blue">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h6 class="text-muted mb-2">
                                Total Students
                            </h6>

                            <h2 class="mb-0">
                                250
                            </h2>
                        </div>

                       <i class="bi bi-people fs-1"></i>

                    </div>
                </div>
            </div>
        </div>

        {{-- Total Courses --}}
        <div class="col-md-6 col-lg-3 mb-4">
           <div class="card shadow-sm border-0 h-100 dashboard-card card-purple">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h6 class="text-muted mb-2">
                                Total Courses
                            </h6>

                            <h2 class="mb-0">
                                12
                            </h2>
                        </div>

                        <i class="bi bi-book fs-1"></i>

                    </div>
                </div>
            </div>
        </div>

        {{-- Fees Collected --}}
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card shadow-sm border-0 h-100 dashboard-card card-green">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h6 class="text-muted mb-2">
                                Fees Collected
                            </h6>

                            <h2 class="mb-0">
                                KES 500,000
                            </h2>
                        </div>

                        <i class="bi bi-cash-stack fs-1"></i>

                    </div>
                </div>
            </div>
        </div>

        {{-- Outstanding Fees --}}
        <div class="col-md-6 col-lg-3 mb-4">
          <div class="card shadow-sm border-0 h-100 dashboard-card card-red">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h6 class="text-muted mb-2">
                                Outstanding Fees
                            </h6>

                            <h2 class="mb-0">
                                KES 120,000
                            </h2>
                        </div>

                       <i class="bi bi-credit-card fs-1"></i>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection