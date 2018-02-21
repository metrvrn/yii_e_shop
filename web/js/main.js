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

})()