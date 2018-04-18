(function(){
    var csrfToken = document.querySelector('meta[name=csrf-token').content;
    var csrfParamName = document.querySelector('meta[name=csrf-param').content;
    var actionButtons = document.querySelectorAll('#uploadBtn');

    for(var i = 0; i < actionButtons.length; i++){
        actionButtons[i].addEventListener('click', handleUploadButton);
    }

    function handleUploadButton(e)
    {
        var btn = e.target;
        btn.setAttribute('disabled', 'disabled');
        var url = btn.dataset.url;
        var panelId = btn.dataset.panel;
        var statusPanel = document.getElementById(panelId);
        statusPanel.style = 'block';
        statusPanel.innerText = 'Загрузка';
        var requestUrl = url + "?" + csrfParamName + "=" + csrfToken;
        upload(requestUrl, 0, btn, statusPanel);
    }

    function upload(requestURL, offset, btn, statusPanel)
    {   
        requestURL += "&" + "offset=" + offset;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', requestURL, true);
        xhr.send();
        xhr.onload = function(e){
            if(xhr.status !== 200){
                btn.removeAttribute('disabled');
                statusPanel.innerText = 'Оишбка ' + xhr.status;
                return;
            }
            var response = JSON.parse(xhr.response);
            if(response.handled < response.total){
                statusPanel.innerText = 'Обработано: ' + response.handled + ' Всего: ' + response.total;
                offset += 10000;
                upload(requestURL, offset, btn, statusPanel);
            }else{
                statusPanel.innerText = 'Готово!';
                btn.removeAttribute('disabled');
            }
        }
    }

})()