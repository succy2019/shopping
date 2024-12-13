@extends('layouts.layout')
@section('content')

    <!-- Hero Slider -->
    <div class="hero">
        <div class="slides" id="slides">
            <img src="https://via.placeholder.com/1200x600/ff7f50/ffffff?text=Slide+1" alt="Slide 1">
            <img src="https://via.placeholder.com/1200x600/4682b4/ffffff?text=Slide+2" alt="Slide 2">
            <img src="https://via.placeholder.com/1200x600/32cd32/ffffff?text=Slide+3" alt="Slide 3">
        </div>
        <div class="slider-controls">
            <button class="slider-control" id="prev">❮</button>
            <button class="slider-control" id="next">❯</button>
        </div>
        <div class="hero-content">
            <h2>Welcome to Our Clothing Store</h2>
            <p>Discover the latest trends and styles!</p>
            <button>Shop Now</button>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="categories-section">
        <h1>Categories</h1>
        <div class="categories-grid">
            <div class="category-card">
                <img src="https://via.placeholder.com/100" alt="Men's Clothing">
                <h3>Men's Clothing</h3>
            </div>
            <div class="category-card">
                <img src="https://via.placeholder.com/100" alt="Women's Clothing">
                <h3>Women's Clothing</h3>
            </div>
            <div class="category-card">
                <img src="https://via.placeholder.com/100" alt="Kids' Clothing">
                <h3>Kids' Clothing</h3>
            </div>
        </div>
    </div>

    <!-- Featured Products Section -->
    <div class="product-section">
        <h1>Featured Products</h1>
        @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
        <div class="product-grid">
            @foreach($products as $product)
            <div class="product-card">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-start" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('images/placeholder.png') }}" alt="Product 1">
                @endif
            
                <div class="product-info">
                    <h2>{{ $product->name }}</h2>
                    <p>Price: N{{ number_format($product->price,2) }}</p>
                    <p>Stock{{ $product->stock }}</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="input-group mb-3">
                            <input type="hidden" name="userId" value="1">
                            <input type="number" name="quantity" class="form-control" id="fullname" placeholder="Quantity" min="1" max="{{ $product->stock }}" required><br><br>
                            <button type="submit" class="add-to-cart">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>

            @endforeach
            
        </div>
    </div>

   @endsection