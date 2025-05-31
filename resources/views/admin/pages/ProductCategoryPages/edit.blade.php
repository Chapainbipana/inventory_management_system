@extends('admin.inc.main')
@section('container')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<main class="container my-3">
    <a href="{{route('productCategory.index')}}" class="btn btn-primary my-3">Back</a>
    <form action="{{ route('productCategory.update', $productCategory->id) }}" method="POST" enctype="multipart/form-data">  
        @csrf
        @method('PUT')

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit</h5>
                <a href="./index.php" class="btn btn-primary">Manage</a>
            </div>
            
            <div class="card-body">
                
                {{-- <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">ProductCategory Name</label>
                    <input type="text" name="title" class="form-control" id="basic-default-fullname" value="{{$productCategory->title}}"/>
                </div> --}}

                <div class="mb-3">
                    <label class="form-label" for="basic-default-category">Product Category</label>
                    <select name="title" class="form-control" id="basic-default-category">
                        <option value="Clothing" {{ $productCategory->title == 'Clothing' ? 'selected' : '' }}>Clothing</option>
                        <option value="Art and Craft" {{ $productCategory->title == 'Art and Craft' ? 'selected' : '' }}>Art and Craft</option>
                        <option value="Accessories" {{ $productCategory->title == 'Accessories' ? 'selected' : '' }}>Accessories</option>
                    </select>
                </div>
                

                <div class="mb-3">
                    <div class="img-scrapper">
                        <div class="form-group col-12 mb-0">
                            <label class="col-form-label">Image</label>
                        </div>


                        <!-- image box where image from model come -->
                        <div class="input-group mb-3 col-12">
                            <input id="imagebox" type="text" class="form-control" disabled name="img" 
                                >
                            <!-- img come above ☝ -->
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                                    data-bs-target="#modalId">
                                    Choose Image
                                </button>
                            </div>
                        </div>
                        <!-- we use modal to choose image -->
                        <div class="mb-3">
                            <!-- Modal trigger button -->

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <!-- styled to see which image is selected  as type radio opacity is 0-->
                                                <style>
                                                    [type=radio]:checked+img {
                                                        outline: 2px solid #f00;
                                                    }
                                                </style>


                                                    <!-- for choosing 1 image from multiple option we use type radio -->
                                                    @foreach($files as $file)
                                                    <label class="col-4">
                                                        <input type="radio" name="image" value="{{ $file->image}}" style="opacity: 0;">
                                                        <img src="{{ asset('uploads/' . $file->image) }}" alt="Image" height="100px" width="100px" style="margin-right: 20px;">
                                                    </label>
                                                @endforeach
                                                    
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal"
                                                onclick=" firstFunction()">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Optional: Place to the bottom of scripts -->
                            <script>
                                const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

                                function firstFunction() {
                                    var x = document.querySelector('input[name=image]:checked').value;
                                    document.getElementById('imagebox').value = x; // use .innerHTML if we want data on label
                                }
                            </script>
                        </div>

                    </div>
                </div>

                <button type="submit"  class="btn btn-primary">Send</button> <br>
            
            </div>
        </div>
    </form>


</main>

@endsection