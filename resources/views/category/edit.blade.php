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
                    {{ __('Update Category') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/category_update/'.$category->id) }}" method="post" >
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $category->name }}">

                                   

                        <div class="modal-footer">
                            <a href="{{ url('/category_index') }}" class="btn btn-primary ">
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