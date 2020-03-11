<?php namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;
use Exception;
use App\Order;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class BuyController extends Controller{
    public function store(Request $request){

        $data = $request->input();
        $reference = "TEST_".$request->id;
        $baseUrl = env('APP_URL');
        $request = [
            "locale" => "es_CO",
            "buyer" => [
                "name" => $request->customer_name,
                "surname" => "",
                "email" => $request->customer_email,
                "address" => [
                    "street" => "Carrera 6 # 45 - 09 Apto 1016 Edificio Portal de la javeriana II",
                    "city" => "Bogota",
                    "phone" => $request->customer_mobile,
                    "country" => "CO"
                ],
                "mobile" => $request->customer_mobile
            ],
            "payment" => [
                "reference" => $reference,
                "description" => "Pago en PlacetoPay",
                "amount" => [
                    "taxes" => [
                        [
                            "kind" => "valueAddedTax",
                            "amount" => "0",
                            "base" => 0
                        ]
                    ],
                    "details" => [
                        [
                            "kind" => "subtotal",
                            "amount" => $request->detail['product_value']
                        ],
                        [
                            "kind" => "discount",
                            "amount" => 0
                        ],
                        [
                            "kind" => "shipping",
                            "amount" => 0
                        ]
                    ],
                    "currency" => "COP",
                    "total" => $request->detail['total_value']
                ],
                "items" => [
                    [
                        "sku" => (int) $request->detail['product_id'],
                        "name" => $request->detail['product']['name'],
                        "category" => "physical",
                        "qty" => (int) $request->detail['quantity'],
                        "price" => (double) $request->detail['product_value'],
                        "tax" => (int) 0
                    ],
                    [
                        "sku" => 26443,
                        "name" => "Qui voluptatem excepturi.",
                        "category" => "physical",
                        "qty" => 1,
                        "price" => 940,
                        "tax" => 89.3
                    ]
                ],
                "shipping" => [
                    "name" => $request->customer_name,
                    "surname" => "",
                    "email" =>  $request->customer_email,
                    "address" => [
                        "street" => "Carrera 6 # 45 - 09 Apto 1016 Edificio Portal de la javeriana II",
                        "city" => "Bogota",
                        "phone" => $request->customer_mobile,
                        "country" => "CO"
                    ],
                    "mobile" => $request->customer_mobile
                ]
            ],
            "returnUrl" => "$baseUrl/order/$request->id/cart",
            "expiration" => date('c', strtotime('+5 minutes')),
            "ipAddress" => "127.0.0.1",
            "userAgent" => "Mozilla\/5.0 (X11; Linux x86_64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/55.0.2883.87 Safari\/537.36"
        ];

        // Request Information
        try {
            $response = $this->placetopay()->request($request);

            if ($response->isSuccessful()) {
                return response()->json($response);
            } else {
                // There was some error so check the message
                return $response->status()->message();
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function update($request, Order $order){

    }

    public function infoOrder(Request $request, Order $order){

        try {
        
            $response = $this->placetopay()->query($request->requestId); 
            // Redirect the client to the processUrl or display it on the JS extension
            if ($response->status()->isApproved()) {
                $order->update(["status" => "PAYED"]);
                $order->save();
            }else{
                if ($response->status()->isRejected()) {
                    $order->update(["status" => "REJECTED"]);
                    $order->save();
                } else{
                    $order->update(["status" => "CREATED"]);
                    $order->save();
                }
            }

            return response()->json($order);
            
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function placetopay()
    {
        $seed = date('c');

        if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }

        return new PlacetoPay([
            "login" => "6dd490faf9cb87a9862245da41170ff2",
            "tranKey" => "024h1IlD",
            "url" => "https://test.placetopay.com/redirection/",
            "nonce" => $nonce,
            "seed" => $seed,
        ]);
    }

}
