<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background color for a mature design */
        }
        .cart-table {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Your Cart</h1>
        @if ($cartItems->isEmpty())
            <div class="alert alert-warning text-center">
                Your cart is empty. <a href="{{ route('cart.view') }}" class="text-primary">Shop now!</a>
            </div>
        @else
            <table class="table table-bordered cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($cartItems as $item)
                        <tr id="row-{{ $item->id }}">
                            <td>{{ $item->product->name }}</td>
                            <td>${{ number_format($item->product->price, 2) }}</td>
                            <td>
                                <input type="number" class="form-control" value="{{ $item->quantity }}" min="1" onchange="updateQuantity({{ $item->id }}, this.value, {{ $item->product->price }})">
                            </td>
                            <td id="total-{{ $item->id }}">${{ number_format($item->quantity * $item->product->price, 2) }}</td>
                            <td>
                                <button class="btn btn-danger" onclick="removeFromCart({{ $item->id }})">Remove</button>
                            </td>
                        </tr>
                        @php $total += $item->quantity * $item->product->price; @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Total</strong></td>
                        <td id="grand-total"><strong>${{ number_format($total, 2) }}</strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <div class="text-end">
                {{-- <form action="{{ route('checkout') }}" method="POST"> --}}
                <form action="" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Proceed to Checkout</button>
                </form>
            </div>
        @endif
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateQuantity(itemId, quantity, price) {
            fetch(`/cart/update/${itemId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ quantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the displayed total for this item
                    const totalCell = document.querySelector(`#total-${itemId}`);
                    totalCell.innerText = `$${data.newTotal}`;

                    // Optionally update the grand total if needed
                    const grandTotalCell = document.querySelector('#grand-total');
                    grandTotalCell.innerText = `$${data.cartTotal}`;
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function removeFromCart(itemId) {
            if (confirm('Are you sure you want to remove this item from your cart?')) {
                fetch(`/cart/remove/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the row from the cart table
                        const row = document.querySelector(`#row-${itemId}`);
                        if (row) {
                            row.remove();
                        }

                        // Optionally, update the grand total
                        const grandTotalCell = document.querySelector('#grand-total');
                        const updatedTotal = Number(grandTotalCell.innerText.replace('$', '')) - Number(data.itemTotal);
                        grandTotalCell.innerText = `$${updatedTotal.toFixed(2)}`;

                        alert(data.message); // Notify user of success
                    } else {
                        alert(data.message); // Show error message
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }
    </script>
</body>
</html>
