
window.onload = async () => {
    await getInfoOrder()
    var quantity = $('#quantity_hidde').val();
    $('#quantity').val(quantity);
};

const getInfoOrder = async () => {

    var requestId = localStorage.getItem("requestId");
    let orderId = localStorage.getItem("orderId");
    var inputOrderId = document.getElementById('orderId').value;
    orderId = (orderId !== 0) ? orderId : inputOrderId;
    const url = `/api/order/${orderId}/buy/status`;
    await ajax("POST", url, {requestId: requestId}).done(result => {
        
        if(requestId > 0){
            statusOrder(result);
        }else{
            document.getElementById('btnSaveOrder').style.display = "block";
            document.getElementById('btnContinueTransaction').style.display = "none";
        }
    }).fail(err => {
        console.log(err);
    });
}

const statusOrder = async (data) => {
    
    switch (data.status) {
        case 'PAYED':
            document.getElementById('statusOrder').innerText = "PAYED";
            document.getElementById('btnSaveOrder').style.display = "none";
            document.getElementById('btnContinueTransaction').style.display = "none";
            return true;
    
        case 'CREATED':
            var processUrl = localStorage.getItem("processUrl");
            document.getElementById('statusOrder').innerText = "CREATED";
            document.getElementById('btnSaveOrder').style.display = "none";
            document.getElementById('btnContinueTransaction').style.display = "block";
            document.getElementById('btnContinueTransaction').setAttribute('href', processUrl);
            return true;

        case 'REJECTED':
            document.getElementById('statusOrder').innerText = "REJECTED";
            document.getElementById('btnSaveOrder').style.display = "block";
            document.getElementById('btnContinueTransaction').style.display = "none";
            document.getElementById('btnContinueTransaction').setAttribute('href', "#");
            return true;
    }
}


const buyOrder = async (order) => {
    var data = JSON.parse(order);
    const url = `/api/order/${data.id}/buy`;
    await ajax("POST", url, data).done(result => {
        localStorage.setItem("requestId", result.requestId);
        localStorage.setItem("processUrl", result.processUrl);
        window.location = result.processUrl;
    }).fail(err => {
        console.log(err);
    });
}