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
                <div class="card-header text-uppercase">{{ __('booking') }}</div>

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

                        <!-- booking$booking registration table -->
                        <div class="container table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Booked_House</th>
                                        <th>Price</th>
                                        <th>Appointment Date</th>
                                        <th>Contact</th>
                                        <th>isPaid</th>
                                        <th>isApproved</th>
                            
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking) 
                                        <tr>
                                            <td>{{ $booking->booked_house }}</td>
                                            <td>{{ $booking->name }}</td>
                                            <td>{{ $booking->price }}</td>
                                            <td>{{ $booking->appointment_date }}</td>
                                            <td>{{ $booking->contact }}</td>
                                            <td>{{ $booking->is_paid }}</td>
                                            <td>{{ $booking->is_approved }}</td>
                                        
                                            <td>
                                                <a href="{{ url('/booking_edit/'.$booking->id) }}" class="btn btn-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i>Edit
                                                </a>
                                                <a href="{{ url('/booking_destroy/'.$booking->id)}}"class="btn btn-danger ">
                                                    <i class="fa-solid fa-trash"></i>Delete
                                                </a> 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $bookings->onEachSide(1)->links() }}
                        </div>
                        <!-- registration modal -->

                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection