<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Retail;
use DB;
use Auth;

class retailStockController extends Controller
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
          ->select('products.id','products.product_name', 'products.sku','products.category','products.description','retails.id','retails.selling_price','retails.quantity','retails.unit')
          ->join('retails', 'retails.products_id', '=', 'products.id')
          ->where('products.product_name', 'LIKE', "%{$search}%")
          ->get();
        return view('retailstocks.index',compact('retails','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('retailstocks.edit', compact('retail'));
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
        DB::update('update retails set quantity=?+quantity WHERE id=?',
        [$quantity, $id]);

        $search = $request->get('search');
        $retails = DB::table('products')
          ->select('products.id','products.product_name', 'products.sku','products.category','products.description','retails.id','retails.selling_price','retails.quantity','retails.unit')
          ->join('retails', 'retails.products_id', '=', 'products.id')
          ->where('products.product_name', 'LIKE', "%{$search}%")
          ->get();
        return view('retailstocks.index',compact('retails','search'));

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
