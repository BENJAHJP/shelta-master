@extends('layouts.app')

@section('content')


<style>
.thumbnail{
    width:7.5rem;
}
</style>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update product') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/product_update/'.$product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $product->name }}">

                                    <label for="owner" class="form-label">Owner</label>
                                            <input type="text" class="form-control" id="owner" name="owner" required="True"  value="{{ $product->owner }}">

                                            <label for="price" class="form-label">price:</label>
                                            <input type="text" class="form-control" id="price" name="price" required="True" value="{{ $product->price }}" >
                                            
                                            <label for="category" class="form-label">Category: </label>
                                            <select name="category" id="category" class="form-select">
                                                @foreach($categories as $category) 
                                                    <option value="{{ $category->name }}" {{ $category->name == $product->category ? 'selected' : '' }} >{{ $category->name }}</option>
                                                @endforeach
                                            </select>

                                            <label for="Description" class="form-label">Description:</label>
                                            <input type="text" class="form-control" id="decription" name="description" required="True" value="{{ $product->description }}">

                                        
                                            <img class="thumbnail" src="{{ $product->image_url }}"  alt="" >
                                            <label for="image_url" class="form-label">Upload image</label>
                                            <input type="file" class="form-control" id="image_url" name="image_url" required="True">


                        <div class="modal-footer">
                            <a href="{{ url('/product_index') }}" class="btn btn-primary ">
                                <i class="fa-solid fa-times">Back</i>
                            </a>
                            <button type="submit" class="btn btn-danger m-2">
                                <i class="fa-solid fa-paper-plane">Update</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection