<?php namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Dnetix\Redirection\PlacetoPay;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller{

    public function index(){
        $products = Product::all();
        return view('shop.index', compact('products'));
    }

    public function create(){
        return view('shop.order.create');
    }

    public function store(OrderRequest $request)
    {
        try {
            $data = $request->input();
            $order = Order::create($data);
            $order->save();
            $order->detail()->create($data['detail']);
            return response()->json($order);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->input();
        $order->update($data);
        $order->detail()->updateOrCreate($data->details);
        return response()->json($order);
    }

    public function cart(Order $order)
    {
        return view('shop.order.cart', compact('order'));
    }
}