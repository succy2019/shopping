@extends('home2.layouts')

@section('content')
<br><br>
<div id="content" class="site-content">
    <div class="sober-container">
        <div id="primary" class="content-area" role="main">
            <div class="cart-detail">
                <h2 class="text-center mb-4">Your Cart</h2>
                @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                @if($cartItems->isEmpty())
                    <div class="alert alert-warning text-center">
                        Your cart is empty. <a href="{{ route('products.index') }}">Browse Products</a>
                    </div>
                @else
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="img-thumbnail" style="width: 100px; height: auto;">
                                    </td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>${{ number_format($item->product->price, 2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="cart-summary text-end">
                        {{-- <h4>Total: ${{ number_format($cartTotal, 2) }}</h4> --}}
                    </div>

                    <div class="cart-actions text-center mt-4">
                        <form action="{{ route('cart.empty') }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Empty Cart</button>
                        </form>
{{-- 
                        <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a> --}}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div><!-- #content -->
@endsection
