@extends('layouts.app')

@section('content')

<style>
.thumbnail{
    width:7.5rem;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-uppercase">{{ __('products') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <!-- search form -->
                   <div class="container m-4">
                        <div class="row">
                            <div class="col-8">
                                <div class="container text-start">
                                    <a href="#" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#product-reg-modal">
                                        <i class="fa-solid fa-add"></i> Add Product
                                    </a>
                                </div>
                            </div>
                            <div class="col text-end">
                                
                            </div>
                        </div>   
                    </div>


                    <div class="container p-0">
                        @if (session('mssg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mssg') }}
                            </div>
                        @endif

                        <!-- products$products registration table -->
                        <div class="container table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Owner</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product) 
                                        <tr>
                                            <td>{{ $product->owner }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td><img class="thumbnail" src="{{ $product->image_url }}"  alt="" ></td>
                                            <td>{{ $product->description }}</td>
                                    
                                            <td>
                                                <a href="{{ url('/product_edit/'.$product->id) }}" class="btn btn-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i>Edit
                                                </a>
                                                <a href="{{ url('/product_destroy/'.$product->id)}}"class="btn btn-danger ">
                                                    <i class="fa-solid fa-trash"></i>Delete
                                                </a> 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $products->onEachSide(1)->links() }}
                        </div>
                        <!-- registration modal -->

                        <div class="modal fade" id="product-reg-modal" aria-labelledby="modal-title" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">product upload</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" required="True">

                                            <label for="owner" class="form-label">Owner</label>
                                            <input type="text" class="form-control" id="owner" name="owner" required="True">

                                            <label for="category" class="form-label">Category: </label>
                                            <select id="category" class="form-select" name="category">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>

                                            <label for="price" class="form-label">price:</label>
                                            <input type="text" class="form-control" id="price" name="price" required="True">
                                            
                                            <label for="Description" class="form-label">Description:</label>
                                            <input type="text" class="form-control" id="decription" name="description" required="True">

                                            <label for="image_url" class="form-label">image:</label>
                                            <input type="file" class="form-control" id="image_url" name="image_url" required="True">

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa-solid fa-paper-plane"></i> Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection