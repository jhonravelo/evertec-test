<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;
use Exception;

class OrderController extends Controller
{
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
        $nonce = base64_encode(rand(0, 10000));
        $secretKey = '024h1IlD';
        $trankey = base64_encode(sha1($nonce . $seed . $secretKey, true));
        $UrlPlaceToPayTest = 'https://test.placetopay.com/redirection/api/session/';

        $placetopay = new PlacetoPay([
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => $trankey,
            'url' => 'https://test.placetopay.com/redirection/api/session/',
            'type' => PlacetoPay::TP_REST
        ]);

        // Request Information
        $reference = 'TEST_' . time();

        $requestPlay = [
            "locale" => "es_CO",
            // "auth" => [
            //     "login" => "6dd490faf9cb87a9862245da41170ff2",
            //     "seed" => $seed,
            //     "nonce" => $nonce,
            //     "tranKey" => '024h1IlD'
            // ],
            "buyer" => [
                "documentType" => "CC",
                "document" => "1001882274",
                "name" => "John",
                "surname" => "Ravelo",
                'company' => 'pluriza',
                "email" => "jhonjairoravelomora@gmail.com",
                "address" => [
                    "street" => "742 Evergreen Terrace",
                    "city" => "Springfield",
                    "country" => "US"
                ],
                'mobile' => '3012951910'
            ],
            "payment" => [
                "reference" => "123456",
                "description" => "Testing Payment",
                "amount" => [
                    "currency" => "COP",
                    "total" => "200000"
                ],
                "allowPartial" => false,
                'items' => [
                    'sku' => '3',
                    'name' => 'Nombre del producto',
                    'category' => 'physical',
                    'qty' => '6',
                    'price' => 50000.00,
                    'tax' => 0
                ]
            ],
            "paymentMethod" => 'CR_VS, RM_MC, CR_AM, CR_DN, CR_VE, GNRIS, CDNSA',
            "expiration" => "2020-03-02T06:30:29-05:00",
            "returnUrl" => "/order/create",
            "cancelUrl" => "/",
            "userAgent" => "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36",
            "ipAddress" => "127.0.0.1",
            "skipResult" => false,
            "noBuyerFill" => false
        ];

        try {

            $response = $placetopay->CreateRequest($requestPlay);

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