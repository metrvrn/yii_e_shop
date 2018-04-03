(function(){

    var csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    var csrfParam = document.querySelector('meta[name="csrf-param"]').content;

    var basketSidepanelSum = document.getElementById('basketSidepanelSum');
    var basketSidepanelQuantity = document.getElementById('basketSidepanelQuantity');
    var basketTable = document.getElementById('basketTable');
    var urlTemplate = basketTable.dataset.url;

    var basketQuantityBtns = document.querySelectorAll('basketQuantityBtn');

    basketTable.addEventListener('click', updateBasketQuantity);

    function updateBasketQuantity(e)
    {
        var target = e.target;
        try{
            while(target.id !== 'basketQuantityBtn'){
                target = target.parentElement;
            }
        }catch(e){
            return;
        }
        var productID = target.dataset.id;
        var icon = target.querySelector('i');
        var input = document.getElementById('basketQuantityInput'+productID);
        var oldValue = Number(input.dataset.oldValue);;
        var quantity = Number(input.value);

        if(isNaN(quantity) || (quantity <= 0)){
            input.value = oldValue;
            return;
        }
        icon.classList.add('basket-table__quantity-icon-animation');

        var url = urlTemplate
            .replace('rID', productID)
            .replace('rQuantity', quantity)
            +"&"+csrfParam+"="+csrfToken;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onload = function()
        {
            if(xhr.status !== 200){
                return;
            }
            var response = JSON.parse(xhr.response);
            basketSidepanelSum.innerText = response.totalSum;
            basketSidepanelQuantity.onnerText = response.totalQuantity;
            input.value = response.quantity;
            icon.classList.remove('basket-table__quantity-icon-animation');
        }
        xhr.send();
    }
})();