(function(){

    var csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    var csrfParam = document.querySelector('meta[name="csrf-param"]').content;

    var headerBasketQuantity = document.getElementById('header_basket_quantity_val');
    var headerBasketSum = document.getElementById('header_basket_price_val');

    var productID = document.getElementById('productID').dataset.id;
    var minusBtn = document.getElementById('btnMinus');
    var plusBtn = document.getElementById('btnPlus');
    var qInput = document.getElementById('quantityInput');
    var basketBtn = document.getElementById('btnBasket');
    var requestUrl = basketBtn.dataset.url;
    var available = Number(qInput.dataset.available);

    console.log(requestUrl);

    minusBtn.addEventListener('click', function(){
        if(qInput.value <= 0) return;
        qInput.value = Number(qInput.value - 1);
    });

    plusBtn.addEventListener('click', function(){
        if(qInput.value >= available) return;
        qInput.value = Number(qInput.value) + 1;
    });

    qInput.addEventListener('input', function(){
        var val = Number(qInput.value);
        var oldVal = Number(qInput.dataset.oldValue);
        if(isNaN(val)){
            qInput.value = oldVal;
            return;
        }else if(val > available){
            qInput.value = available;
        }
        qInput.dataset.oldValue = val;
    });

    basketBtn.addEventListener('click', function(){
        var url = requestUrl
            .replace('idReplace', productID)
            .replace('qReplace', qInput.value)
            +"&"+csrfParam+"="+csrfToken;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onload = function(e){
            var response = e.target;
            if(response.status === 200){
                var responseData = JSON.parse(response.responseText);
                headerBasketQuantity.innerText = responseData.basketQuantity;
                headerBasketSum.innerText = responseData.basketSum;
                console.dir(responseData);
            }else{
                throw new Exception('Error');
            }
        }
        xhr.send();
    });

})()