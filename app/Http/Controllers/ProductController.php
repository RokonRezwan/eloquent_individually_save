<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $data['products'] = Product::all();
        $data['categories'] = Category::all();
        return view('products.index', $data);
    }

    public function create()
    {
        $data['categories'] = Category::all();
        return view('products.create', $data);
    }

    public function store(Request $request)
    {
        //validate the input
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'is_active' => 'required|boolean',
        ]);

        //creat a new product when have fillable/gurded in model
       /*  Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'is_active' => $request->is_active,
        ]);
 */
        //creat a new product when no fillable/gurded in model
        //create instanse
        $product = new Product; 

        //insert data
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->is_active = $request->is_active;

        //save to database

        $product->save();



        //redirect the user and send friendly message
        return redirect()->route('products.index')->with('success','Product created successfully');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $data['product'] = $product;
        $data['categories'] = Category::all();
        return view('products.edit', $data);
    }

    public function update(Request $request, Product $product)
    {
        return $product;
        //validate the input
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',            
            'is_active' => 'required|boolean',
        ]);

        //update product
        Product::where('id', $product->id)
                 ->update([
                     'name' => $product->name,
                     'category_id' => $product->category_id,
                     'is_active' => $product->is_active,
                 ]);

        //$product->update();



        //redirect the user and send friendly message
        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    public function destroy(Product $product)
    {
        //delete the product
        $product->delete();

        //redirect the user with a success message
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }

    public function status(Product $product)
    {
        
        if ($product->is_active == 1) 
         {
            Product::where('id', $product->id)
                    ->update(['is_active' => 0]);
         }
        else 
         {
            Product::where('id', $product->id)
                    ->update(['is_active' => 1]);    
         }

         return redirect()->back()->with('success','Product Status changed successfully');
        
    }
    
}
