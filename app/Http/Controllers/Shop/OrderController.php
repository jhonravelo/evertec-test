<?php namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Dnetix\Redirection\PlacetoPay;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $products = Product::all();
        return view('shop.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
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

        $reference = 'TEST_' . time();

        // Request Information
        $request = json_decode('{
            "locale": "es_CO",
            "buyer": {
                "name": "Isabella",
                "surname": "Caro",
                "email": "isabellacaro@javeriana.edu.co",
                "address": {
                    "street": "Carrera 6 # 45 - 09 Apto 1016 Edificio Portal de la javeriana II",
                    "city": "Bogota",
                    "phone": "3206515736",
                    "country": "CO"
                },
                "mobile": null
            },
            "payment": {
                "reference": "300038996",
                "description": "Pago en PlacetoPay",
                "amount": {
                    "taxes": [
                        {
                            "kind": "valueAddedTax",
                            "amount": "42635.0000",
                            "base": 224397
                        }
                    ],
                    "details": [
                        {
                            "kind": "subtotal",
                            "amount": "224397.0000"
                        },
                        {
                            "kind": "discount",
                            "amount": 0
                        },
                        {
                            "kind": "shipping",
                            "amount": "0.0000"
                        }
                    ],
                    "currency": "COP",
                    "total": "267032.0000"
                },
                "shipping": {
                    "name": "Isabella",
                    "surname": "Caro",
                    "email": "isabellacaro@javeriana.edu.co",
                    "address": {
                        "street": "Carrera 6 # 45 - 09 Apto 1016 Edificio Portal de la javeriana II",
                        "city": "Bogota",
                        "phone": "3206515736",
                        "country": "CO"
                    },
                    "mobile": null
                }
            },
            "returnUrl": "https:\/\/www.evertec.test:441\/Perros\/placetopay\/processing\/response\/?reference=300038996",
            "expiration": "' . date('c', strtotime('+5 minutes')) . '",
            "ipAddress": "120.0.0.1",
            "userAgent": "Mozilla\/5.0 (X11; Linux x86_64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/55.0.2883.87 Safari\/537.36"
        }', true);

        try {
            $response = $this->placetopay()->request($request);

            if ($response->isSuccessful()) {
                // Redirect the client to the processUrl or display it on the JS extension
                //redirect($response->processUrl());
            } else {
                // There was some error so check the message
                $response->status()->message();
            }
            var_dump($response);
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

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

    public function placetopay()
    {
        $seed = date('c');
        $secretKey = '024h1IlD';

        if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }

        $tranKey = base64_encode(sha1($nonce . $seed . $secretKey));
        
        $nonceBase64 = base64_encode($nonce);

        return new PlacetoPay([
            "login" => "6dd490faf9cb87a9862245da41170ff2",
            "tranKey" => "024h1IlD",
            "url" => "https://test.placetopay.com/redirection/",
            "nonce" => $nonce,
            "seed" => $seed,
        ]);
    }
}