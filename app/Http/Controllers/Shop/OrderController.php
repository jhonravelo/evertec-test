<?php namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('shop.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $order = Order::create($data);
        $order->save();
        $order->detail()->create($data['detail']);

        $seed = date('c');
        $nonce1 = rand(0, 10000);
        $nonce = base64_encode($nonce1);
        $secretKey = '024h1IlD';
        $trankey = base64_encode(sha1($nonce1 . $seed . $secretKey, true));

        $placetopay = new PlacetoPay([
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => $secretKey,
            'url' => 'https://evertec-test.test:441',
        ]);

// Request Information
        $reference = 'TEST_' . time();

        $requestPlay = [
            'payment' => [
                'reference' => $reference,
                'description' => 'Testing payment',
                'amount' => [
                    'currency' => 'USD',
                    'total' => 120,
                ],
            ],
            "buyer" => [
                "name" => "Isabella",
                "surname" => "Caro",
                "email" => "isabellacaro@javeriana.edu.co",
                "address" => [
                    "street" => "Carrera 6 # 45 - 09 Apto 1016 Edificio Portal de la javeriana II",
                    "city" => "Bogota",
                    "phone" => "3206515736",
                    "country" => "CO",
                ],
                "mobile" => null,
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => "http://evertec-test.test/response/$reference",
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];

        try {

            $response = $placetopay->request($requestPlay);

            dd($response);

            if ($response->isSuccessful()) {
                // Redirect the client to the processUrl or display it on the JS extension
                return $response->processUrl();
            } else {
                // There was some error so check the message
                return $response->status()->message();
            }
            // var_dump($response->processUrl());
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        // return response()->json($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('shop.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('shop.edit', compact(`order`));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $data = $request->input();

        $order->update($data);

        $order->detail()->updateOrCreate($data->details);

        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    /**
     * cart the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function cart(Order $order)
    {
        return view('shop.order.cart', compact('order'));
    }
}