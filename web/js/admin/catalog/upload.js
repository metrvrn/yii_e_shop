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
        catalogErrorMsg.style.display = 'none';
        catalogUploadBtn.setAttribute('disabled', true);
        catalogProgressContainer.style.display = 'block';
        catalogProgressBar.style.width = "0%";
        uploadCatalog(0, 1);
    });

    function uploadCatalog(currentStep, totalStep) {
        var requestUrl = encodeURI(catalogUploadUrl + '&step=' + currentStep);
        var xhr = new XMLHttpRequest();
        xhr.open('GET', requestUrl, true);
        xhr.send();

        xhr.addEventListener('load', function(){
            if(xhr.status !== 200){
                catalogErrorMsg.style.display = 'block';
                catalogErrorMsg.innerHTML = xhr.status + " " + xhr.statusText;
            }
            var response = JSON.parse(xhr.response);
            var currentStep = Number(response.currentStep);
            var totalStep = Number(response.totalStep);
            if(currentStep === totalStep){
                catalogUploadBtn.removeAttribute('disabled');
                console.log('EXIT');
                return;
            }
            currentStep++;
            catalogProgressBar.style.width = currentStep / totalStep * 100 + "%";
            uploadCatalog(currentStep, totalStep)
        });
    }

    function uploadPrice(){

    }

    function uploadQuantity(){

    }

})()