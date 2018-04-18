(function(){

    var pickupCheckbox = document.getElementById('pickupCheckbox');
    var addressInputs = document.querySelector('#addressInputsContainer')
        .querySelectorAll('input[type="text"]');

    pickupCheckbox.addEventListener('click', function(e){
        var state = e.target.checked;
        if(state){
            for(var i = 0; i < addressInputs.length; i++){
                addressInputs[i].setAttribute('disabled', true);
            }
        }else{
            for(var i = 0; i < addressInputs.length; i++){
                addressInputs[i].removeAttribute('disabled');
            }
        }
    });

    
})();