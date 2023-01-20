<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Booking;

class MobileProductController extends Controller{
    public function index($categoryId){
        return Product::where('category','LIKE',"%{$categoryId}%",)->get();
    }

    public function product($productId){
        return Product::findOrFail($productId);
    }

    public function storeBooking(){
        if(
            Booking::create([
            'name' => request('name'),
            'booked_house' => request('booked_house'),
            'appointment_date' => request('appointment_date'),
            'price' => request('price'),
            'contact' => request('contact'),
            'is_paid' => request('is_paid'),
            'is_approved' => request('is_approved')])){

            return [
                "message" => "success" 
            ];
        } else {
            return [
                "message" => "not successful" 
            ];
        }
    }
}
