const ajax = (method, url, data) => {
    return $.ajax({
        method: method,
        url: url,
        data: data,
        dataType: "json"

        // }
    });
}

const buyProduct = (id) => {
    localStorage.setItem('productId', id);
    location.href = "/order/create";
}

const orderSummary = () => {
    var idOrder = localStorage.getItem('idOrder');
    location.href = `order/${idOrder}/cart`;
}