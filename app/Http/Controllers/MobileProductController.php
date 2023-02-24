<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Booking;

class MobileProductController extends Controller{
    public function products_by_category($categoryId){
        return Product::where('category','LIKE',"%{$categoryId}%",)->get();
    }

    public function products_by_name($name){
        return Product::where('name','LIKE',"%{$name}%",)->get();
    }
    
    public function product_details($productId){
        return Product::where('name','LIKE',"%{$productId}%",)->get();
    }

    public function top_products(){
        return Product::all();
    }

    public function get_bookings($name){
        return Booking::where('name','LIKE',"%{$name}%",)->get();
    }

    public function search_product($search_query){
        return Product::where('name','LIKE',"%{$search_query}%",)->get();
    }

    public function store_booking(){
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
