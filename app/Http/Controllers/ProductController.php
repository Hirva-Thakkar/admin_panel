<?php

namespace App\Http\Controllers;

use App\Models\Product;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;
use PDF; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();
        // dd($data);
        return view('dashboard', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        unset($request['_token']);
        
        // $file = $request->file('file');
        // $fileName = time().''.$file->getClientOriginalName();
        // $filePath = $file->storeAs('images',$fileName , 'public');

        // $product = new Product;
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->price = $request->price;
        // $product->image = $filePath;
        // // $product->save(); 
        // if($request->file('file')){
        //     $product = Product::find($id);
        //     $product->image = $filePath;
        //     $product->insert();
        // }

        Product::insert($request->all()); 
        return redirect()->route('products.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product , $id)
    {
        $data = Product::where('id', $id)->first();
        // dd($data);
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        Product::where('id', $id)->update($data);
        return redirect()->route('products.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::where('id', $id)
                ->delete();       
         return redirect()->route('products.index');
    }

    public function generatePDF($id)
    {
    $product = Product::find($id);

    $pdf = PDF::loadView('pdf', compact('product'));

    return $pdf->download('Product_Details.pdf');
    }

}
