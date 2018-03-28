(function(){
    

    //toggle catalog dropdown menu
    (function(){
        var catalogDropdownBtn = document.getElementById('catalog_dropdown_btn');
        if(!catalogDropdownBtn) return;
        var catalogDropdownMenu = document.getElementById('catalog_dropdown_menu');
        catalogDropdownBtn.addEventListener('click', function(){
            catalogDropdownMenu.classList.toggle('catalog-dropdown--close');
        });
    })();

    //search
    var searchInput = document.getElementById('mainSearchInput');
    var requestUrl = searchInput.dataset.url;
    var searchResponseWrap = document.getElementById('searchResponseWrap');
    var searchResponseCloseBtn = document.getElementById('searchResponseCloseBtn');
    var searchResponseList = document.getElementById('searchResponseList');
    var detailPageLink = searchResponseWrap.dataset.detailUrl;

    var csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    var csrfParam = document.querySelector('meta[name="csrf-param"]').content;

    searchInput.addEventListener('input', handleSeachInput);
    searchResponseCloseBtn.addEventListener('click', function(){
        searchResponseList.innerHTML = '';
        searchResponseWrap.classList.remove('header-middle__search-response-wrap--open');
    })

    console.log(searchResponseList);


    function handleSeachInput()
    {
        var value = searchInput.value.trim();
        var url = requestUrl.replace('rPattern', value)+"&"+csrfParam+"="+csrfToken;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onload = function()
        {
            if(xhr.status !== 200){
                throw new Exception('Error');
            }
            var products = JSON.parse(xhr.response);
            searchResponseList.innerHTML = '';
            for(var i = 0; i < products.length; i++){
                var product = products[i];
                //create elements
                var listElem = document.createElement('li');
                var elemLink = document.createElement('a');
                var elemImage = document.createElement('img');
                var elemName = document.createElement('span');
                //classes
                listElem.classList.add('header-middle__search-response-elem');
                elemLink.classList.add('header-middle__search-response-elem-link');
                elemImage.classList.add('header-middle__search-response-image');
                elemName.classList.add('header-middle__search-response-elem-name')
                //values
                elemLink.href = detailPageLink.replace('rID', product.id);
                elemImage.src = "/images/catalog/"+product.image.path;
                elemName.innerText = product.name;
                //append
                elemLink.appendChild(elemImage);
                elemLink.appendChild(elemName);
                listElem.appendChild(elemLink);
                searchResponseList.appendChild(listElem);
            }
            searchResponseWrap.classList.add('header-middle__search-response-wrap--open');
        }
        xhr.send();
    }
})()