<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $products = DB::table('products')
          ->select('id','product_name','sku','description','price', 'quantity', 'manuf_date', 'exp_date')
          ->where('sku', 'LIKE', "%{$search}%")
          ->get();
          return view('stocks.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stocks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = $request->validate([
            'product_name' => 'required',
            'sku' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required', 
        ]);
        $show = Product::create($items);
   
        return redirect()->back();
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
        $stocks = Product::findOrFail($id);
        return view('stocks.edit', compact('stocks'));
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
        $quantity  = $request->input('quantity');
        
        DB::update('update products set quantity=?+quantity WHERE id=?',
        [$quantity, $id]);

        $search = $request->get('search');
        $products = DB::table('products')
          ->select('id','product_name','sku','description','price', 'quantity', 'manuf_date', 'exp_date')
          ->where('sku', 'LIKE', "%{$search}%")
          ->get();

        return view('stocks.index', compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
