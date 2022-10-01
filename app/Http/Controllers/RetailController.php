<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\retail;
use Auth;
use DB;

class RetailController extends Controller
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
        $retails = DB::table('products')
          ->select('products.id','products.product_name', 'products.sku','products.category','products.description','products.manuf_date','products.exp_date','retails.id','retails.buying_price','retails.selling_price','retails.quantity','retails.unit')
          ->join('retails', 'retails.products_id', '=', 'products.id')
          ->where('products.product_name', 'LIKE', "%{$search}%")
          ->get();
        return view('retails.index',compact('retails','search'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = DB::table("products")->pluck("product_name", "id");
         return view('retails.create', compact('products'));
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
            'products_id' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
            'unit' => 'required',
            'reorder' => 'required',
        ]);

        $show = Retail::create($validatedData);
        //dd($validatedData->all());
   
        return redirect('/retails/create')->with('success', 'Product is successfully saved');
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
        $retail = Retail::findOrFail($id);
        return view('retails.edit', compact('retail'));
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
            'buying_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
            'unit' => 'required',
            'reorder' => 'required',
        ]);
        retail::whereId($id)->update($validatedData);
        return redirect('/retails')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $retail = Retail::findOrFail($id);
        $retail->delete();

        return redirect('/retails');
    }
}
