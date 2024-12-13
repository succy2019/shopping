@extends('admin.layout')

@section('content')
<h1 class="mb-4">Update USer</h1>
<!-- Success and Error Messages -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- Bootstrap Form -->
<form action="#" method="POST" class="needs-validation" novalidate>
{{-- <form action="" method="POST" class="needs-validation" novalidate> --}}
    @csrf <!-- Include CSRF token for security -->
    

    <div class="row mb-3">
        <!-- Full Name -->
        <div class="col-md-6">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="name" value="{{$user->name}}" required>
            <div class="invalid-feedback">Full Name is required.</div>
        </div>

        <!-- Email -->
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
            <div class="invalid-feedback">A valid email is required.</div>
        </div>
    </div>

    <div class="row mb-3">
        <!-- Phone -->
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{$user->phone}}" required>
            <div class="invalid-feedback">Phone number is required.</div>
        </div>

        <!-- Meter Number -->
        <div class="col-md-6">
            <label for="meter_number" class="form-label">Meter Number</label>
            <input type="text" class="form-control" id="meter_number" name="meter_number" value="{{$user->meter_number}}" required>
            <div class="invalid-feedback">Meter Number is required.</div>
        </div>
    </div>

    <div class="row mb-3">
        <!-- Meter Type -->
        <div class="col-md-6">
            <label for="meter_type" class="form-label">Meter Type</label>
            <input type="text" class="form-control" id="meter_type" name="meter_type" value="{{$user->meter_type}}" required>
            
            <div class="invalid-feedback">Please select a meter type.</div>
        </div>

        <!-- Location -->
        <div class="col-md-6">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{$user->location}}" required>
            <div class="invalid-feedback">Location is required.</div>
        </div>
        <div class="col-md-6">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="location" value="{{$user->status}}" required>
            <div class="invalid-feedback">Location is required.</div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-end">
        <button type="submit" class="btn btn-primary">UPDATE</button>
        {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
    </div>
</form>

<script>
    // Bootstrap validation script
    (function () {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
@endsection
