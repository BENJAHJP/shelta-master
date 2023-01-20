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
                <div class="card-header text-uppercase">{{ __('Category') }}</div>

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
                                        <i class="fa-solid fa-add"></i> Add Category
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
                                   
                                        <th>Name</th>
                                        <th>Action</th>
                                    
                            
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category) 
                                        <tr>
                                            <td>{{ $category->name }} </td>
                                            <td>
                                                <a href="{{ url('/category_edit/'.$category->id) }}" class="btn btn-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i>Edit
                                                </a>
                                                <a href="{{ url('/category_destroy/'.$category->id)}}"class="btn btn-danger ">
                                                    <i class="fa-solid fa-trash"></i>Delete
                                                </a> 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->onEachSide(1)->links() }}
                        </div>
                        <!-- registration modal -->

                        <div class="modal fade" id="product-reg-modal" aria-labelledby="modal-title" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title"> Add Category </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('category.store') }}" method="post" >
                                            @csrf
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" required="True">

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