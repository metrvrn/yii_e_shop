(function () {

    var csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');

    var fullUrl = window.location.href
    var separatorIndex = fullUrl.lastIndexOf('/');
    var baseUrl = fullUrl.slice(0, separatorIndex);

    var catalogUploadUrl = baseUrl  + '/catalog-upload-ajax';
    var priceUploadUrl = baseUrl + '/price-upload-ajax';
    var quantityUploadUrl = baseUrl + '/price-upload-ajax'

    var catalogUploadBtn = document.getElementById('catalog_upload_btn');
    var catalogProgressContainer = document.getElementById('catalog_progress_container');
    var catalogProgressBar = document.getElementById('catalog_progress_bar');
    var catalogErrorMsg = document.getElementById('catalog_error_msg');

    var priceUploadBtn = document.getElementById('price_upload_btn');
    var priceProgressContainer = document.getElementById('price_progress_container');
    var priceProgressBar = document.getElementById('price_progress_bar');

    var quantityUploadBtn = document.getElementById('quantity_upload_btn');
    var quantityProgressContainer = document.getElementById('quantity_progress_container');
    var quantityProgressBar = document.getElementById('quantity_progress_bar');

    catalogUploadBtn.addEventListener('click', function(){
        catalogUploadBtn.setAttribute('disabled', true);
    });

    priceUploadBtn.addEventListener('click', function(){
        priceUploadBtn.setAttribute('disabled', true);
    });

    quantityUploadBtn.addEventListener('click', function(){
        quantityUploadBtn.setAttribute('disabled', true);
    })

    function uploadCatalog() {

    }

    function uploadPrice(){

    }

    function uploadQuantity(){

    }

})()