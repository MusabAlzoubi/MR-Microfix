@include('components.Layouts.header')
    
   
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- User Information -->
            <div class="card">
                <div class="card-header">
                    <h4>User Information</h4>
                </div>
                <div class="card-body">
                    <p><i class="bi bi-person"></i> <strong>Name:</strong> {{ $user->name }}</p>
                    <p><i class="bi bi-envelope"></i> <strong>Email:</strong> {{ $user->email }}</p>
                    <p><i class="bi bi-telephone"></i> <strong>Mobile:</strong> {{ $user->mobile ?? 'N/A' }}</p>
                    <p><i class="bi bi-house"></i> <strong>Address:</strong> {{ $user->address ?? 'N/A' }}</p>
                    <!-- Add more user information fields as needed -->
                </div>
            </div>

            <!-- Order History -->
            @if($orders->count() > 0)
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Order History</h4>
                    </div>
                    <div class="card-body">
                        @foreach($orders as $order)
                            <div class="order-details mb-4">
                                <p><i class="bi bi-file-text"></i> <strong>Order ID:</strong> {{ $order->id }}</p>
                                <p><i class="bi bi-calendar"></i> <strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>
                                <p><i class="bi bi-box"></i> <strong>Status:</strong> {{ ucfirst($order->status) }}</p>

                                <!-- Order Status Change History -->
                                @if ($order->status_changes->count() > 0)
                                    <p><strong>Status Change History:</strong></p>
                                    <ul>
                                        @foreach ($order->status_changes as $change)
                                            <li><i class="bi bi-clock"></i> {{ $change->created_at->format('Y-m-d H:i:s') }} - {{ ucfirst($change->new_status) }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <!-- Order Details Table -->
                                <table class="table mt-3">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->details as $detail)
                                            <tr>
                                                <td>{{ $detail->product->name }}</td>
                                                <td>{{ $detail->quantity }}</td>
                                                <td>${{ $detail->price }}</td>
                                                <td>${{ $detail->quantity * $detail->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <p><strong>Total Amount:</strong> ${{ $order->total_amount }}</p>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h4>Total Amount Spent: ${{ $totalAmount }}</h4>
                    </div>
                </div>
            @else
                <p>No orders found.</p>
            @endif
        </div>
        <div class="col-md-4">
            <!-- Your existing Livewire component for editing user information -->
            <div class="card">
                <div class="card-header">
                    <h4>Edit User Information</h4>
                </div>
                <div class="card-body">
                    <livewire:edit-user :user="$user" />
                </div>
            </div>
        </div>
    </div>
</div>



@include('components.Layouts.footer')
