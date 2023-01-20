<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
     
    public function index()
    {
        $categories = Category::paginate(10);
       return view('category.index' ,compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
          
        ]);

    
      
        $categories = Category::create([
            'name' => $request->input('name'),
       
        ]);

        return redirect('/category_index')->with('mssg', 'Category Added   successfuly');
    }
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();
        
        return redirect('/category_index')->with('mssg', 'Category  deleted successfuly');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
        
    }

    public function update($id)
    {
        request()->validate([
            'name'=>'required',
          
        ]);
        $category = Category::findOrFail($id);

        $category->name = request("name");
            
        $category->update();

        return redirect('/category_index')->with('mssg', 'category updated successfully');
    }
}
