<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $categories = Category::All();
        $products = Product::paginate(10);
        
        return view('product.index', compact('products','categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'owner'=>'required',
            'name'=>'required',
            'price'=>'required',
            'category'=>'required',
            'image_url' => 'required|image|mimes:png,jpg,jpeg|max:5048',
            'description'=>'required',
        ]);

        $newImage = 'http://10.42.0.1:8080/images/' .time() . '-' . $request->image_url->getClientOriginalName() . '.' .
        $request->image_url->extension();
        
        $imagePath = time() . '-' . $request->image_url->getClientOriginalName() . '.' .
        $request->image_url->extension();

        $request->image_url->move(public_path('images'), $newImage);

        $product = Product::create([
            'name' => $request->input('name'),
            'owner' => $request->input('owner'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'image_url' => $newImage,
            'image_path' => $imagePath,
        ]);

        return redirect('/product_index')->with('mssg', 'Product created successfuly');
    }

    public function get()
    {

    }

    public function edit($id)
    {
        $categories = Category::All();
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product','categories'));
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if(File::exists(public_path('images/'.$product->image_path))){
            File::delete(public_path('images/'.$product->image_path));
            $product->delete();
            return redirect('/product_index')->with('mssg', 'Product  deleted successfuly');
        }
    }

    public function search()
    {

    }

    public function update($id)
    {
        $product = Product::findOrFail($id);
        $newImage = 'http://10.42.0.1:8080/images/' .time() . '-' . request()->image_url->getClientOriginalName() . '.' .
        request()->image_url->extension();
    
        $imagePath = time() . '-' . request()->image_url->getClientOriginalName() . '.' .
        request()->image_url->extension();
            request()->image_url->move(public_path('images'), $newImage);

            $product->name = request("name");
            $product->owner =request("owner");
            $product->price = request("price");
            $product->description = request("description");
            $product->category = request("category");
            $product->image_url = $newImage;
            $product->image_path = $imagePath;
            
            $product->update();
    
            return redirect('/product_index')->with('mssg', 'Product updated successfuly');
        
    
    }

}
