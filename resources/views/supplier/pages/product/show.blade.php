@extends('admin.inc.main')

@section('container')
<div class="container my-4">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">
            <h1 class="text-center">Product Details</h1>
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
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Name:</div>
                <div class="col-md-8">{{ $product->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Description:</div>
                <div class="col-md-8">{{ $product->description }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Price:</div>
                <div class="col-md-8">Rs {{ number_format($product->price, 2) }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Stock:</div>
                <div class="col-md-8">{{ $product->stock }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Image:</div>
                <div class="col-md-8">
                    <img src="{{asset('uploads/' . $product->image)}}" alt="Product Image" width="50">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">Category:</div>
                <div class="col-md-8">{{ $product->category->title ?? 'No Category' }}</div>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('product.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
