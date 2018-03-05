(function(){
    var basketSidebar = document.getElementById('basket_sidebar');

    console.dir(basketSidebar);
    
    window.document.addEventListener('scroll', function(e){
        var top = basketSidebar.getBoundingClientRect().top;
        console.log(basketSidebar.offsetTop - window.pageYOffset);
        if(window.pageYOffset > (basketSidebar.offsetTop - 24)){
            basketSidebar.style.top = Math.abs(basketSidebar.offsetTop - window.pageYOffset) + 'px';
        }
    });

})();