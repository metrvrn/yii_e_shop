(function(){

    var addToBasketUrl = document.location.protocol+"//"+document.location.host+"/basket/add-ajax";
    var csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    var csrfParam = document.querySelector('meta[name="csrf-param"]').content;

    var headerBasketQuantity = document.getElementById('header_basket_quantity_val');
    var headerBasketSum = document.getElementById('header_basket_price_val');

    var quantityInputElems = document.querySelectorAll('input[data-action="quantity_input"]');

    quantityInputElems.forEach(function(elem){
        elem.oldValue = 1;
    });
    
    window.document.addEventListener('click', buttonsHandler);
    window.document.addEventListener('input', inputHandler);

    function buttonsHandler(e)
    {
        var isControl = false;
        var target = e.target;
        var action = target.dataset.action;
        while(!isControl){
            switch(action){
                case 'minus_btn':
                    minusBtn(target);
                    isControl = !isControl;
                    break;
                case 'plus_btn':
                    plusBtn(target);
                    isControl = !isControl;
                    break;
                case 'add_btn':
                    addBtn(target)
                    isControl = !isControl;
                    break;
                default:
                    if(target.parentElement === null) isControl = !isControl;
                    try{
                        target = target.parentElement;
                        action = target.dataset.action;
                    }catch(e){}
            }
        }
    }

    function inputHandler(e)
    {
        var input = e.target;
        if(input.dataset.action !== 'quantity_input') return;
        var oldValue = input.oldValue;
        var newValue = input.value;
        if(newValue.search(/^\d+$/)){
            input.value = oldValue;
        }else{
            input.oldValue = newValue;
        }
    }

    function plusBtn(btnElem)
    {
        var input = btnElem.parentElement.querySelector('input[data-action="quantity_input"]');
        input.value = ++input.value;
        
    }

    function minusBtn(btnElem)
    {
        var input = btnElem.parentElement.querySelector('input[data-action="quantity_input"]');
        var quantity = Number(input.value);
        if(quantity <= 1) return;
        input.value = --quantity;
    }

    function addBtn(btnElem)
    {
        btnElem.setAttribute('disabled', true);
        var productID = btnElem.parentElement.id;
        var quantity = btnElem.parentElement.querySelector('input[data-action="quantity_input"]').value;
        var requestParams = "?productId="+productID+"&quantity="+quantity;
        var requestUrl = encodeURI(addToBasketUrl+requestParams);
        var xhr = new XMLHttpRequest();
        xhr.open('GET', requestUrl, true);
        xhr.setRequestHeader('X-CSRF-Token', csrfToken);
        xhr.onload = function(e){
            var response = e.target;
            if(response.status === 200){
                btnElem.removeAttribute('disabled');
                var responseData = JSON.parse(response.responseText);
                headerBasketQuantity.innerText = responseData.basketQuantity;
                headerBasketSum.innerText = responseData.basketSum;
                console.dir(responseData);
            }else{
                throw new Exception('Error');
                btnElem.removeAttribute('disabled');
            }
        }
        xhr.send();
    }

    function quantityInput(inputELem)
    {

    }

})();