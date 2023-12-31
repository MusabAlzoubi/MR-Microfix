<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="order-summary-container">
                <div class="order-summary-header mb-20">
                    <h4>Your Order Summary</h4>
                </div>

                <div class="table-responsive order-table">
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
                </div>

                <div class="order-summary-total mt-30">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="cart-total-label">Cart Subtotal</td>
                                <td class="cart-total-amount">${{ Cart::instance('cart')->subtotal() }}</td>
                            </tr>
                            <tr>
                                <td class="cart-total-label">Tax</td>
                                <td class="cart-total-amount">${{ Cart::instance('cart')->tax() }}</td>
                            </tr>
                            <tr>
                                <td class="cart-total-label">Shipping</td>
                                <td class="cart-total-amount">
                                    <i class="ti-gift mr-5"></i> Free Shipping
                                </td>
                            </tr>
                            <tr>
                                <td class="cart-total-label">Total</td>
                                <td class="cart-total-amount">${{ Cart::instance('cart')->total() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="border-line mt-30 mb-30"></div>

             <!-- Inside the "payment-method" div -->
<div class="payment-method">
    <div class="payment-heading mb-25">
        <h5>Payment</h5>
    </div>

        <!-- Payment Method Selection Form -->
        <form id="payment-method-form">
            <div class="form-group">
                <label for="payment-method">Select Payment Method</label>
                <select id="payment-method" name="payment-method" class="form-control" required>
                    <option value="cash-on-delivery">Cash on Delivery</option>
                    <option value="credit-card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>
        </form>

        <!-- Payment Details Sections -->
        <div id="credit-card-details" class="payment-details" style="display: none;">
            <div class="form-group">
                <label for="card-number">Card Number</label>
                <input type="text" id="card-number" name="card-number" class="form-control" placeholder="xxxx-xxxx-xxxx-xxxx" required maxlength="16">
            </div>
            <div class="form-group">
                <label for="expiry-date">Expiry Date</label>
                <input type="month" id="expiry-date" name="expiry-date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" class="form-control" placeholder="***" maxlength="3" required>
            </div>
        </div>

        <div id="paypal-details" class="payment-details" style="display: none;">
            <!-- PayPal details or additional payment method details go here -->
        </div>

        <div id="cash-on-delivery-details" class="payment-details" style="display: none;">
            <!-- Additional details for Cash on Delivery, if needed -->
        </div>
        </div>

        <!-- JavaScript to toggle payment details based on selected method and add validation -->
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            var paymentMethodSelect = document.getElementById('payment-method');
            var creditCardDetails = document.getElementById('credit-card-details');
            var paypalDetails = document.getElementById('paypal-details');
            var cashOnDeliveryDetails = document.getElementById('cash-on-delivery-details');

            paymentMethodSelect.addEventListener('change', function () {
                var selectedMethod = paymentMethodSelect.value;

                // Hide all payment details sections
                creditCardDetails.style.display = 'none';
                paypalDetails.style.display = 'none';
                cashOnDeliveryDetails.style.display = 'none';

                // Show details for the selected payment method
                if (selectedMethod === 'credit-card') {
                    creditCardDetails.style.display = 'block';
                } else if (selectedMethod === 'paypal') {
                    paypalDetails.style.display = 'block';
                } else if (selectedMethod === 'cash-on-delivery') {
                    cashOnDeliveryDetails.style.display = 'block';
                }
                // Add more conditions for other payment methods as needed
            });

            // Basic validation for credit card details
            document.getElementById('payment-method-form').addEventListener('submit', function (event) {
                var selectedMethod = paymentMethodSelect.value;

                if (selectedMethod === 'credit-card') {
                    var cardNumber = document.getElementById('card-number').value;
                    var expiryDate = document.getElementById('expiry-date').value;
                    var cvv = document.getElementById('cvv').value;

                    if (!cardNumber || !expiryDate || !cvv) {
                        alert('Please fill in all credit card details.');
                        event.preventDefault();
                    }
                }
                // Add more validation for other payment methods as needed
            });
        });
        </script>


                <div class="total-amount mb-25">
                    <h5>Total Amount: ${{ Cart::instance('cart')->total() }}</h5>
                </div>

                <div class="place-order-btn">
                    <a wire:click="placeOrder" href="#" class="btn btn-fill-out btn-block mt-30">Place Order</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @if ($showEditForm)
            <livewire:edit-user :user="$user" />
            @endif
        </div>
    </div>
</div>
