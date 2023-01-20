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
                    {{ __('Update booking') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/booking_update/'.$booking->id) }}" method="post" >
                        @csrf
                        @method("put")
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $booking->name }}">

                                            <label for="owner" class="form-label">Booked_House</label>
                                            <input type="text" class="form-control" id="booked_house" name="booked_house" required="True"  value="{{ $booking->booked_house }}">

                                            <label for="price" class="form-label">price:</label>
                                            <input type="text" class="form-control" id="price" name="price" required="True" value="{{ $booking->price }}" >
                                            
                                            <label for="Description" class="form-label">appointment_date:</label>
                                            <input type="date" class="form-control" id="appointment_date" name="appointment_date" required="True" value="{{ $booking->appointment_date }}">

                                            <label for="contact" class="form-label">contact</label>
                                            <input type="text" class="form-control" id="contact" name="contact" required="True" value="{{ $booking->contact }}">

                                            <label for="is_paid" class="form-label">is_paid</label>
                                            <input type="text" class="form-control" id="is_paid" name="is_paid" required="True" value="{{ $booking->is_paid }}">

                                            <label for="is_approved" class="form-label">is_approved</label>
                                            <input type="text" class="form-control" id="is_approved" name="is_approved" required="True" value="{{ $booking->is_approved }}">

        



                        <div class="modal-footer">
                            <a href="{{ url('/booking_index') }}" class="btn btn-primary ">
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