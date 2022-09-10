<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
use DB;
use Auth;

class StockController extends Controller
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
        $this -> validate($request,[
            'product_name' => 'required',
            'category' => 'required',
            'sku' => 'required',
            'description' => 'required',
            'buying_price' => 'required',
            'price' => 'required',
            'unit' => '',
            'quantity' => 'required', 
            'reorder' => '', 
            'manuf_date' => '',
            'exp_date' => '', 
            'shop' => 'required',
            
        ]);
        $items = new Product;
        
            $items->product_name = $request->input('product_name');
            $items->category = $request->input('category');
            $items->sku = $request->input('sku');
            $items->description = $request->input('description');
            $items->buying_price = $request->input('buying_price');
            $items->price = $request->input('price');
            $items->unit = $request->input('unit');
            $items->quantity = $request->input('quantity');
            $items->reorder = $request->input('reorder');
            $items->manuf_date = $request->input('manuf_date');
            $items->exp_date = $request->input('exp_date');
            $items->shop = $request->input('shop');
            $items->user_id = auth()->user()->id;
            $items->save();
   
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

        $items = new Purchase;
            $items->products_id = $request->input('products_id');
            $items->quantity = $request->input('quantity');
            $items->date = $request->input('date');
            $items->buying_price = $request->input('buying_price');
            $items->save();

        $search = $request->get('search');
        $products = DB::table('products')
          ->select('id','product_name','sku','description', 'quantity', 'manuf_date', 'exp_date')
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
