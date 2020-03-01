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
            // window.location = `/order/${result.id}/cart`;
            console.log(result);
            
        })
        .fail(err => {
            console.log(err);
        });
};