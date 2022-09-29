<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Sale;
use DB;

class SalesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fromdate = Carbon::parse($request->fromdate)
                             ->toDateTimeString();

       $todate = Carbon::parse($request->todate)
                             ->toDateTimeString();
       
         $search = $request->get('search');

        $sales = DB::table('products')
          ->select('products_id','products.product_name', 'products.sku','products.price','sales.created_at', 'sales.quantity as quantity',\DB::raw('sales.quantity*products.price as subtotal'),\DB::raw('sales.quantity*products.price - sales.quantity*products.buying_price as profit'))
          ->join('sales', 'sales.products_id', '=', 'products.id')
          ->where('products.product_name', 'LIKE', "%{$search}%")
          ->get();

          $dates=DB::table('products')
          ->select('products_id','products.product_name', 'products.sku','products.price','sales.created_at', 'sales.quantity as quantity',\DB::raw('sales.quantity*products.price as subtotal'),\DB::raw('sales.quantity*products.price - sales.quantity*products.buying_price as profit'))
          ->join('sales', 'sales.products_id', '=', 'products.id')
          ->whereDate('sales.created_at', '>=', $fromdate)
          ->whereDate('sales.created_at', '<=', $todate)
          ->get();


        $profit=DB::table('products')
        ->select('products_id',\DB::raw('sales.quantity*products.price as subtotal'),\DB::raw('sum(sales.quantity*products.price - sales.quantity*products.buying_price) as total_profit'))
        ->join('sales', 'sales.products_id', '=', 'products.id')
        ->where('products.product_name', 'LIKE', "%{$search}%")
        ->get();

          $totals = DB::table('products')
          ->select('products.price',\DB::raw("SUM(sales.quantity*products.price) as total") )
          ->join('sales', 'sales.products_id', '=', 'products.id')
          ->where('products.product_name', 'LIKE', "%{$search}%")
          ->get();

          $quantity = DB::table('products')
          ->select('products.price',\DB::raw("SUM(sales.quantity) as quantity") )
          ->join('sales', 'sales.products_id', '=', 'products.id')
          ->where('products.product_name', 'LIKE', "%{$search}%")
          ->get();

        return view('salesreports.index',compact('sales', 'totals', 'search','quantity', 'dates', 'profit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bydate(Request $request)
    {
        $fromdate = Carbon::parse($request->fromdate)
                             ->toDateTimeString();

       $todate = Carbon::parse($request->todate)
                             ->toDateTimeString();
                             $sales = DB::table('products')
                             ->select('products_id','products.product_name', 'products.sku','products.price','sales.created_at', 'sales.quantity as quantity',\DB::raw('sales.quantity*products.price as subtotal'),\DB::raw('sales.quantity*products.price - sales.quantity*products.buying_price as profit'))
                             ->join('sales', 'sales.products_id', '=', 'products.id')
                             ->get();
                             
                             $dates=DB::table('products')
                             ->select('products_id','products.product_name', 'products.sku','products.price','sales.created_at', 'sales.quantity as quantity',\DB::raw('sales.quantity*products.price as subtotal'),\DB::raw('sales.quantity*products.price - sales.quantity*products.buying_price as profit'))
                             ->join('sales', 'sales.products_id', '=', 'products.id')
                             ->whereDate('sales.created_at', '>=', $fromdate)
                             ->whereDate('sales.created_at', '<=', $todate)
                             ->get();
                             $profit_by_date=DB::table('products')
                             ->select('products_id',\DB::raw('sales.quantity*products.price as subtotal'),\DB::raw('sum(sales.quantity*products.price - sales.quantity*products.buying_price) as total_profit'))
                             ->join('sales', 'sales.products_id', '=', 'products.id')
                             ->whereDate('sales.created_at', '>=', $fromdate)
                             ->whereDate('sales.created_at', '<=', $todate)
                             ->get();
                     
                               $total_by_date = DB::table('products')
                               ->select('products.price',\DB::raw("SUM(sales.quantity*products.price) as total") )
                               ->join('sales', 'sales.products_id', '=', 'products.id')
                               ->whereDate('sales.created_at', '>=', $fromdate)
                             ->whereDate('sales.created_at', '<=', $todate)
                               ->get();
                     
                               $quantity_by_date = DB::table('products')
                               ->select('products.price',\DB::raw("SUM(sales.quantity) as quantity") )
                               ->join('sales', 'sales.products_id', '=', 'products.id')
                               ->whereDate('sales.created_at', '>=', $fromdate)
                               ->whereDate('sales.created_at', '<=', $todate)
                               ->get();
                               return view('salesreports.bydate',compact('sales','total_by_date','quantity_by_date', 'dates', 'profit_by_date'));                  
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
        //
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
        //
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
