(function(){
    var openDeliveryFormBtn = document.getElementById('openDeliveryFormBtn');
    var closeDeliveryFormBtn = document.getElementById('closeDeliveryFormBtn');
    var deliveryFormWrapper = document.getElementById('deliveryFormWrapper');

    if(!openDeliveryFormBtn) return;

    openDeliveryFormBtn.addEventListener('click', function(e){
        deliveryFormWrapper.classList.add('delivery-panel-form--open');
    });

    closeDeliveryFormBtn.addEventListener('click', function(e){
        e.preventDefault();
        deliveryFormWrapper.classList.remove('delivery-panel-form--open');
    });
    
})();