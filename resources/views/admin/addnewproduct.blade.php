@extends('admin.layout') {{-- Extend your main layout --}}

@section('content')
<div class="container">
    <h1 class="my-4">Add New Product</h1>

    {{-- Display validation errors --}}
    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    {{-- Product Form --}}
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf {{-- CSRF token for form security --}}
        
        {{-- Product Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="form-control" 
                value="{{ old('name') }}" 
                placeholder="Enter product name" 
                required>
        </div>

        {{-- Product Price --}}
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input 
                type="number" 
                name="price" 
                id="price" 
                class="form-control" 
                value="{{ old('price') }}" 
                placeholder="Enter product price" 
                min="0" 
                step="0.01" 
                required>
        </div>

        {{-- Product Stock --}}
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input 
                type="number" 
                name="stock" 
                id="stock" 
                class="form-control" 
                value="{{ old('stock') }}" 
                placeholder="Enter product stock" 
                min="0" 
                required>
        </div>

        {{-- Product Image --}}
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input 
                type="file" 
                name="image" 
                id="image" 
                class="form-control" 
                accept="image/*">
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
@endsection
