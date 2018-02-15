(function(){
    document.body.addEventListener('click', function(e){
        var target = e.target;
        while(target.dataset.role !== 'control'){
            target = target.parentElement;
        }
        console.dir(target);
    });
})();