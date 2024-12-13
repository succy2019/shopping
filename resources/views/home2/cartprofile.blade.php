@extends('home2.layouts')

@section('content')
<br><br>
    <div id="content" class="site-content">
        <div class="sober-container">
            <div id="primary" class="content-area" role="main">
                <div class="Productprofile-detail">
                   > <!-- Productprofile Name -->
                    <div class="text-center mb-4">
                        <img src="{{ asset($Productprofile->image) }}" alt="{{ $Productprofile->name }}" class="img-fluid" style="max-width: 100%; height: auto;"> <!-- Productprofile Image -->
                    </div>
                    <div class="Productprofile-info">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>Description:</th>
                                    <td>{{ $Productprofile->price }}</td>
                                </tr>
                                <tr>
                                    <th>Price:</th>
                                    <td>${{ number_format($Productprofile->price, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Category:</th>
                                    <td>{{ $Productprofile->name }}</td>
                                </tr>
                                <tr>
                                    <th>Stock Status:</th>
                                    <td>{{ $Productprofile->stock ? 'In Stock' : 'Out of Stock' }}</td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="purchase-section text-center mt-4">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="userId" value="1">
						<input type="number" name="quantity" class="form-control" id="fullname" placeholder="Quantity" min="1" max="{{ $Productprofile->stock }}" required>
                            <button type="submit" class="btn btn-primary btn-lg">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #content -->
@endsection
