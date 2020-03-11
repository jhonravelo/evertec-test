const ajax = (method, url, data) => {
    return $.ajax({
        method: method,
        url: url,
        data: data,
        headers: {
            "accept": "application/json",
            "Access-Control-Allow-Origin": "*"
        },
        contentType: 'application/x-www-form-urlencoded',
        xhrFields: { withCredentials: true },
        beforeSend: function () {
            Swal.fire({
                title: 'Loading...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                onOpen: () => {
                  swal.showLoading();
                }
            })
        }
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