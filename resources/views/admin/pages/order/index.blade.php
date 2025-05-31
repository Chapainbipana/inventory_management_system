@extends('admin.inc.main')

@section('container')
<div class="container my-5">
    <div class=" justify-content-between align-items-center mb-4">
        <h1 class="text-center">Manage Orders</h1>
        {{-- <a href="" class="btn btn-primary">
            <i class="fas fa-file-export"></i> Export Orders
        </a> --}}
    </div>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <!-- Filters Section -->
    {{-- <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('order.index') }}" class="row g-3">
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Search by Order ID or Customer">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">Filter by Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Shipped">Shipped</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="date" name="date" class="form-control" placeholder="Filter by Date">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-secondary w-100">
                        <i class="fas fa-filter"></i> Apply Filters
                    </button>
                </div>
            </form>
        </div>
    </div> --}}

    <!-- Orders List -->
    @if($orders->isEmpty())
        <div class="alert alert-info text-center">
            <p>No orders found. Try adjusting your filters.</p>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Total Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->first_name }} {{ $order->user->last_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->order_date)->format('F j, Y') }}</td>
                            <td>
                                <span class="badge {{ $order->order_status == 'Pending' ? 'bg-warning text-dark' : ($order->order_status == 'Cancelled' ? 'bg-danger' : 'bg-success') }}">
                                    {{ ucfirst($order->order_status) }}
                                </span>
                            </td>
                            <td><span class="badge {{ $order->payment == 'paid' ? 'bg-warning text-dark' : 'bg-danger' }}">
                                {{ ucfirst($order->payment) }}
                            </span>
                        </td>
                            <td>Rs {{$order->total_price}}</td>
                            <td>
                                <a href="{{ route('order.show', $order->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#updateStatusModal-{{ $order->id }}">
                                    <i class="fas fa-edit"></i> Update Status
                                </button>
                                {{-- <a href="{{ route('admin.orders.invoice', $order->id) }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-file-invoice"></i> Invoice
                                </a> --}}
                            </td>
                        </tr>

                        <!-- Update Status Modal -->
                        <div class="modal fade" id="updateStatusModal-{{ $order->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Status for Order #{{ $order->id }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('order.update', $order->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Order Status</label>
                                                <select name="order_status" class="form-select" required>
                                                    <option value="Pending" {{ $order->order_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="Completed" {{ $order->order_status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                                    {{-- <option value="Delivered" {{ $order->order_status == 'Delivered' ? 'selected' : '' }}>Delivered</option> --}}
                                                    <option value="Cancelled" {{ $order->order_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $orders->links() }}
        </div>
    @endif
</div>
@endsection
