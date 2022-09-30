<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $items = DB::table('products')
        ->where('product_name', 'LIKE', "%{$search}%")
        ->get();
        return view('items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'category' => 'required',
            'sku' => 'required',
            'description' => 'required',
            'photo' => '',
            'manuf_date' => '',
            'exp_date' => '',
            'reorder' => 'required',
        ]);
        $show = Product::create($validatedData);
   
        return redirect('/items')->with('success', 'Data is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('items.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'category' => 'required',
            'sku' => 'required',
            'description' => 'required',
            'photo' => '',
            'manuf_date' => '',
            'exp_date' => '',
            'reorder' => 'required',
        ]);
        Product::whereId($id)->update($validatedData);
        return redirect('/items')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        return redirect('/items')->with('success', 'Data is successfully deleted');
    }
}
