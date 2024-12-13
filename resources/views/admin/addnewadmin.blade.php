@extends('admin.layout')

@section('content')
<h1 class="mb-4">Add New Admin</h1>
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
<form action="{{ route('admin.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf 
    

    <div class="row mb-3">
        <!-- Full Name -->
        <div class="col-md-6">
            <label for="fullname" class="form-label">Admin Name</label>
            <input type="text" class="form-control" id="fullname" name="name" placeholder="Enter full name" required>
            <div class="invalid-feedback">Full Name is required.</div>
        </div>

        <!-- Email -->
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
            <div class="invalid-feedback">A valid email is required.</div>
        </div>
    </div>

    <div class="row mb-3">
        <!-- Phone -->
        <div class="col-md-6">
            <label for="phone" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter phone number" required>
            <div class="invalid-feedback">password is required.</div>
        </div>

        <!-- Meter Number -->
    
    </div>

    <div class="row mb-3">
        <!-- Meter Type -->
        <div class="col-md-6">
            <label for="meter_type" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="" disabled selected>Select Admin Role</option>
                <option value="super admin">Super Admin</option>
                <option value="admin">Admin</option>
            </select>
            <div class="invalid-feedback">Please select a admin type.</div>
        </div>

        <!-- Location -->
        <div class="col-md-6">
            <label for="location" class="form-label">Access Control</label>
            <select class="form-select" id="access" name="access" required>
                <option value="" disabled selected>Select Access Control</option>
                <option value="Full Access">Full Access</option>
                <option value="admin access">Admin Access</option>
            </select>
            <div class="invalid-feedback">Access control is required.</div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
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
