window.onload = async() => {
    var productId = localStorage.getItem("productId");
    await listProduct(productId);
};

const listProduct = async id => {
    const url = `/api/product/${id}`;
    product = await ajax("GET", url).then(data => data);
    $("#image").attr("src", product.image);
    $("#nameProduct").text(product.name);
};

const saveOrder = async() => {
    const url = `/api/order`;
    var quantity = $("#quantity").val();
    const data = {
        customer_name: $("#customer_name").val(),
        customer_email: $("#customer_email").val(),
        customer_mobile: $("#customer_phone").val(),
        status: "CREATED",
        detail: {
            product_id: product.id,
            quantity: quantity,
            product_value: product.price,
            total_value: product.price * quantity
        }
    };

    await ajax("POST", url, data)
        .done(result => {

            playtopace(result);
            // window.location = `/order/${result.id}/cart`;
            console.log(result);

        })
        .fail(err => {
            console.log(err);
        });
};

const playtopace = async(data) => {
    const url = `https://test.placetopay.com/redirection/api/session/`;
    const data1 = {
        "locale": "es_CO",
        "buyer": {
            "name": "Mrs. Ellie Koch Jr.",
            "surname": "Cruickshank",
            "email": "ortiz.jace@hotmail.com",
            "documentType": "CC",
            "document": "4642250139",
            "mobile": "3006108300",
            "address": {
                "street": "693 Prohaska Glens",
                "city": "Dickinsonville",
                "state": "Antioquia",
                "postalCode": "48629-5054",
                "country": "CO",
                "phone": "1-581-303-4433 x062"
            }
        },
        "payment": {
            "reference": "TEST_20200302_140851",
            "description": "Et nulla deserunt earum ut nam.",
            "amount": {
                "taxes": [{
                        "kind": "ice",
                        "amount": 2.88
                    },
                    {
                        "kind": "valueAddedTax",
                        "amount": 4.56
                    }
                ],
                "details": [{
                        "kind": "shipping",
                        "amount": 1.2
                    },
                    {
                        "kind": "tip",
                        "amount": 1.2
                    },
                    {
                        "kind": "subtotal",
                        "amount": 24
                    }
                ],
                "currency": "USD",
                "total": 33.84
            },
            "items": [{
                "sku": 89507,
                "name": "Sint a debitis.",
                "category": "physical",
                "qty": 1,
                "price": 24,
                "tax": 4.56
            }],
            "recurring_remove": {
                "periodicity": "D",
                "interval": 7,
                "nextPayment": "2020-03-04",
                "maxPeriods": 4,
                "notificationUrl": "https://dnetix.co/ping/recurring_notification"
            },
            "shipping": {
                "name": "Mrs. Ellie Koch Jr.",
                "surname": "Cruickshank",
                "email": "ortiz.jace@hotmail.com",
                "documentType": "CC",
                "document": "4642250139",
                "mobile": "3006108300",
                "address": {
                    "street": "693 Prohaska Glens",
                    "city": "Dickinsonville",
                    "state": "Antioquia",
                    "postalCode": "48629-5054",
                    "country": "CO",
                    "phone": "1-581-303-4433 x062"
                }
            },
            "allowPartial": false
        },
        "expiration": "2020-03-03T14:08:51-05:00",
        "ipAddress": "75.33.170.145",
        "userAgent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36 OPR/66.0.3515.103",
        "returnUrl": "https://dnetix.co/p2p/client",
        "cancelUrl": "https://dnetix.co",
        "skipResult": false,
        "noBuyerFill": false,
        "captureAddress": false,
        "paymentMethod": null,
        "fields": [{
            "keyword": "Redeem Code",
            "value": 897991,
            "displayOn": "payment"
        }],
        "auth": {
            "login": "6dd490faf9cb87a9862245da41170ff2",
            "tranKey": "mDosKihmG3UtW9kNAla5K0/3xkk=",
            "nonce": "TXprME1HTm1NV1l3TVRFMk16ZGpabUUwTVdGaU9EaG1ZbVprWkdSak5UUT0=",
            "seed": "2020-03-02T14:08:52-05:00"
        }
    }

    await ajax("POST", url, data1).then(Data => {
        console.log(data);
    })
}