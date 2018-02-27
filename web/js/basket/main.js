(function(){
    var basketSidebar = document.getElementById('basket_sidebar');

    console.dir(basketSidebar);
    
    window.document.addEventListener('scroll', function(e){
        var top = basketSidebar.getBoundingClientRect().top;
        // if(basketSidebar.offsetTop == 0){
        //     console.log()
        // }
    });

})();