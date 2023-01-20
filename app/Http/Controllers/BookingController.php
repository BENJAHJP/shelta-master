<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;

class BookingController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $bookings = Booking::paginate(10);
        
        return view('booking.index', compact('bookings'));
    }

    public function update($id){
        
        $bookings = Booking::findOrFail($id);
        $bookings->name = request("name");
        $bookings->booked_house =request("booked_house");
        $bookings->price = request("price");
        $bookings->appointment_date = request("appointment_date");
        $bookings->contact = request("contact");
        $bookings->is_paid = request("is_paid");
        $bookings->is_approved = request("is_approved");
            
        $bookings->save();

        return redirect('/booking_index')->with('mssg', 'Booking updated successfuly');
        
    }

    public function edit($id)
    {
        $bookings = Booking::findOrFail($id);
        return view('booking.edit', compact('booking'));
        
      
    }

    public function destroy($id){

        $bookings = Booking::findOrFail($id);
        $bookings->delete();
        
        return redirect('/booking_index')->with('mssg', 'Booking  deleted successfuly');
    }

    public function search()
    {
        $search = request('search');

        if($search){
            $bookings = Booking::where('name','LIKE',"%{$search}%")->paginate(5);
        }else{
            $bookings = Booking::paginate(10);
        
        }

        return view("booking.index", compact("booking"));
    }
}
