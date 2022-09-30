<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Sale;
use DB;
use Auth;

class ProductsControllerWholesale extends Controller
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

    public function index(Request $request)
    {
        //$products = Product::all();
        //return view('products', compact('products'));
        $search = $request->get('search',null);
        $productType = $request->get('type','retail');
        $sessionProductType = session('productType','retail');

        if($sessionProductType != $productType){
            session()->forget('cart');
        }

        $priceColumn = 'price';
        if($productType == 'wholesale'){
            $priceColumn = 'wholesale_price as price';
            session()->put('productType','wholesale');
        }else{
            session()->put('productType','retail');
        }

        $products = Product::select('id', 'product_name', 'sku', 'description', $priceColumn)
            ->when($search,function ($query) use ($search){
                $query->where('sku', 'LIKE', "%{$search}%")
                    ->orWhere('product_name', 'LIKE', "%{$search}%");
            })
            ->get();
        return view('pos.products', compact('products', 'search'));
    }

    public function cart()
    {
        return view('cart');
    }
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        $productType = session('productType','retail');
        $priceColumn = 'price';
        if($productType == 'wholesale'){
            $priceColumn = 'wholesale_price';
        }

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_name" => $product->product_name,
                "quantity" => 1,
                "id" => $product->id,
                "sku" => $product->sku,
                "price" => $product->$priceColumn,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function confirmorder(Request $request)
    {
        $user = Auth::user()->id;
        $cashier = Auth::user()->name;

        $orders = new Order;
        $orders->user_id=$user;
        $orders->save();

        foreach($request->productname as $key=>$productname){
            $sales=new Sale;
            $sales->products_id=$request->productsid[$key];
            $sales->sku=$request->productsku[$key];
            $sales->quantity=$request->quantity[$key];
            $sales->user_id=$user;
            $sales->cashier=$cashier;
            $sales->order_id=$orders->id;
            $sales->save();

            Product::where('sku',$request->productsku[$key])->update([
                'quantity' => DB::raw('quantity - '.$request->quantity[$key])
            ]);
        }

        Payment::create([
            'user_id' => $user,
            'orders_id' => $orders->id,
            'amount' => $request->description,
            'payment_mode' => 0
        ]);

        $userOrder = Order::
            select(\DB::raw('
                orders.*,
                (select company_name from company) as company_name,
                (select address from company) as company_address,
                (select phone_number from company) as company_phone_number
            '))
            ->where('id', $orders->id)
            ->with('sales', 'sales.product', 'payment')
            ->first();

        $productType = session('productType','retail');
        $priceColumn = 'price';
        $userOrder->receipt_title = 'Cash Sale';
        if($productType == 'wholesale'){
            $priceColumn = 'wholesale_price';
            $userOrder->receipt_title = 'Invoice';
        }

        $userOrder->sales->map(function ($sale) use ($priceColumn){
            $sale->total_price += $sale->product->$priceColumn * $sale->quantity;
            $sale->product->price = $sale->product->$priceColumn;
        });

        //dd($request->all());
        session()->flash('userOrder', $userOrder);
        session()->forget('cart');
        session()->forget('productType');
        return redirect()->back();
        // dd($orders);
    }

    public function cancelorder(Request $request)
    {
        session()->forget('cart');
        session()->forget('productType');
        return redirect('/pos');
    }



    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
