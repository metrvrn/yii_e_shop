(function () {

    var csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');

    var fullUrl = window.location.href
    var separatorIndex = fullUrl.lastIndexOf('/');
    var baseUrl = fullUrl.slice(0, separatorIndex);

    var catalogUploadUrl = baseUrl  + '/catalogUploadAjax.php';
    var priceUploadUrl = baseUrl + '/priceUploadAjax.php';
    var quantityUploadUrl = baseUrl + '/quantityUploadAjax.php'

    var catalogUploadBtn = document.getElementById('catalog_upload_btn');
    var catalogProgressContainer = document.getElementById('catalog_progress_container');
    var catalogProgressBar = document.getElementById('catalog_progress_bar');

    var priceUploadBtn = document.getElementById('price_upload_btn');
    var priceProgressContainer = document.getElementById('price_progress_container');
    var priceProgressBar = document.getElementById('price_progress_bar');

    var quantityUploadBtn = document.getElementById('quantity_upload_btn');
    var quantityProgressContainer = document.getElementById('quantity_progress_container');
    var quantityProgressBar = document.getElementById('quantity_progress_bar');

    catalogUploadBtn.addEventListener('click', uploadCatalog);


    function uploadCatalog(e, currentStep, totalStep) {
        if(currentStep === undefined) currentStep = 0;
        catalogUploadBtn.setAttribute('disabled', true);
        var requestUrl = encodeURI(catalogUploadUrl + "?step=" + currentStep);
        // var xhr = new XMLHttpRequest();
        // xhr.open('POST', requestUrl, true);
        // xhr.send();
    }

})()