const ajax = async (method, url, data) => {
    return await $.ajax({
        method: method,
        url: url,
        data: data,
        beforeSend: function () {
            
        }
    });
}

const buyProduct = () => {
    location.href = "order";
    console.log('cart');

}
