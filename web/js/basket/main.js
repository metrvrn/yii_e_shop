(function(){

    var csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    var csrfParam = document.querySelector('meta[name="csrf-param"]').content;

    var basketSidepanelSum = document.getElementById('basketSidepanelSum');
    var basketSidepanelQuantity = document.getElementById('basketSidepanelQuantity');
    var basketTable = document.getElementById('basketTable');
    var urlTemplate = basketTable.dataset.url;

    var basketQuantityBtns = document.querySelectorAll('basketQuantityBtn');

    basketTable.addEventListener('click', function(e){
        var target = e.target;
        while(target.id !== 'basketQuantityBtn'){
            target = target.parentElement;
        }
        var productID = target.dataset.id;
        var input = document.getElementById('basketQuantityInput'+productID);
        var quantity = Number(input.value);
        updateBasketQuantity(productID, quantity);
    });

    function updateBasketQuantity(productID, quantity)
    {
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
            console.log(response);
        }
        xhr.send();
    }
})();