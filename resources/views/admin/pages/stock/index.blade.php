@extends('admin.inc.main')
@section('container')


    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



    <div class="container my-3">

     <h2 class="text-center mb-4">Stock Manage</h2>
         @if (session('error'))
         <div class="alert alert-danger">
            {{ session('error') }}
          </div>
        @endif
        {{-- <a href="{{ route('.create') }}" class="btn btn-primary my-4">Add</a> --}}
        <table class="table table-secondary 
         table-hover table-bordered table-sm table-responsive-sm">
            <thead>
    <tr>
        <th>S.N</th>
        <th>Product</th>
        <th>Image</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
@foreach ($stocks as $stock)
    <tr>
        <th>{{ $loop->iteration }}</th>
        <td>{{ $stock->product->name ?? 'N/A' }}</td>
        <td><img src="{{ asset('uploads/' . $stock->product->image) }}" alt="{{ $stock->product->name }}" width="50"></td>
        <td>{{ $stock->quantity ?? 0 }}</td>
        <td>
            <!-- Edit Button -->
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                data-bs-target="#editStockModal{{ $stock->id }}">
                Edit
            </button>

            <!-- Edit Modal -->
            <div class="modal fade" id="editStockModal{{ $stock->id }}" tabindex="-1" aria-labelledby="editStockModalLabel{{ $stock->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('stock.update', $stock->id ?? 0) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editStockModalLabel{{ $stock->id }}">Edit Stock for {{ $stock->product->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label>Current Quantity:</label>
                                <input type="number" name="quantity" class="form-control" value="{{ $stock->quantity ?? 0 }}" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Button -->
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                data-bs-target="#deleteModal{{ $stock->id }}">
                Delete
            </button>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal{{ $stock->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $stock->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('product.destroy', $stock->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete {{ $stock->product->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this product?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </td>
    </tr>
@endforeach
</tbody>

        {{-- {{ $ProductCategory->links() }} --}}
    </div>

@endsection