@extends('admin.inc.main')

@section('container')
    <div class="container my-5">
        <div class="m-3">
            <h1 class="text-center">Order Details</h1>
            <a href="{{ route('order.index') }}" class="btn btn-secondary">Back to Orders</a>
        </div>

        <div class="card shadow-sm">
            <!-- Order Header -->
            <div class="card-header bg-light">
                <h5 class="mb-0">Order {{ $order->id }} - {{ $order->order_status }}</h5>
                <p class="text-muted">Placed on: {{ $order->order_date }} | Customer: {{ $order->user->first_name ?? 'Unknown' }} {{ $order->user->last_name ?? 'Unknown' }}</p>
            </div>

            <!-- Order Items -->
            <div class="card-body">
                <h4>Order Items</h4>
                <div class="list-group">
                    @foreach ($order->items as $item)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <!-- Product Details -->
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('uploads/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="rounded" style="width: 80px; height: 80px; margin-right: 15px;">
                                <div>
                                    <h6 class="mb-0">{{ $item->product->name }}</h6>
                                    <p class="text-muted mb-1">{{ $item->product->description }}</p>
                                    <strong>Rs {{ $item->price }}</strong>
                                </div>
                            </div>
                            <!-- Quantity -->
                            <span class="badge bg-primary">{{ $item->order_quantity }} x</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Order Summary -->
            <div class="card-footer text-end">
                <h5>Total Price: Rs {{ $order->total_price }}</h5>
            </div>
        </div>

        <!-- Order Actions -->
        {{-- <div class="mt-4">
            <form action="{{ route('order.update', $order->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="order_status" class="form-label">Update Order Status</label>
                    <select id="order_status" name="order_status" class="form-select">
                        <option value="Pending" {{ $order->order_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Completed" {{ $order->order_status == 'Completed' ? 'selected' : '' }}>Completed</option>
                       
                        <option value="Cancelled" {{ $order->order_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Update Status</button>
            </form>
        </div> --}}
    </div>
@endsection
