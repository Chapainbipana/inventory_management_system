@extends('admin.inc.main')

@section('container')
<div class="container mt-5">
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
<div class="container my-3">
    <h2 class="text-center mb-4">Revenue</h2>
    <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>S.N</th>
                <th>Payment ID</th>
                <th>Transaction Code</th>
                <th>Amount</th>
                <th>Quantity</th>
                <th>User</th>
                <th>Product</th>
                <th>Date</th>
                </tr>
        </thead>
        <tbody>
            @foreach ($revenue as $value)
            
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->transaction_code }}</td>
                    <td>{{ $value->amount }}</td>
                    <td>{{ $value->quantity }}</td>
                    <td>{{ $value->user->first_name }} {{ $value->user->last_name }}</td>
                    <td><img src="{{ asset('uploads/' . $value->product->image) }}" alt="{{ $value->product->name }}" width="50"></td>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($value->created_at)->format('F j, Y') }}</td>
                </tr>
            @endforeach
        </tbody>
        {{-- <tfoot>
            <tr>
                <strong>Total Income:</strong>  Rs {{ $totalIncome }}  
              </tr>
        </tfoot> --}}
    </table>
</div>
    <div class="d-flex justify-content-center mt-4">
        {{$revenue->links()}}
    </div>

    <div class="mt-4">
        <strong>Total Income:</strong>  Rs {{ $totalIncome }}
    </div>
</div>
</div>
@endsection