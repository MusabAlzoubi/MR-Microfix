<!-- ... (existing HTML) ... -->
<div class="col-md-6">
    <div class="order_review">
        <div class="mb-20">
            <h4>Your Order Summary</h4>
        </div>

        <div class="table-responsive order_table text-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th></th> <!-- New column for product image -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>
                                <div class="product-info">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="product-image">
                                    <span class="product-name">{{ $item->name }}</span>
                                </div>
                            </td>
                            <td>{{ $item->qty }}</td>
                            <td>${{ $item->price }}</td>
                            <td>${{ $item->total }}</td>
                            <td></td> <!-- Placeholder for product image column -->
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table">
                <tbody>
                    <tr>
                        <td class="cart_total_label">Cart Subtotal</td>
                        <td class="cart_total_amount">${{ Cart::instance('cart')->subtotal() }}</td>
                    </tr>
                    <tr>
                        <td class="cart_total_label">Tax</td>
                        <td class="cart_total_amount">${{ Cart::instance('cart')->tax() }}</td>
                    </tr>
                    <tr>
                        <td class="cart_total_label">Shipping</td>
                        <td class="cart_total_amount">
                            <i class="ti-gift mr-5"></i> Free Shipping
                        </td>
                    </tr>
                    <tr>
                        <td class="cart_total_label">Total</td>
                        <td class="cart_total_amount">${{ Cart::instance('cart')->total() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="bt-1 border-color-1 mt-30 mb-30"></div>

        <div class="payment_method">
            <div class="mb-25">
                <h5>Payment</h5>
            </div>
            <!-- Your payment options go here -->
        </div>

        <div class="mb-25">
            <h5>Total Amount: ${{ Cart::instance('cart')->total() }}</h5>
        </div>

        <div class="place-order-btn">
            <a wire:click="placeOrder" href="#" class="btn btn-fill-out btn-block mt-30">Place Order</a>
        </div>
    </div>
</div>


<!-- ... (existing HTML) ... -->
