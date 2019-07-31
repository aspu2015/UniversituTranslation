var langs = {};
function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    location.search
        .substr(1)
        .split("&")
        .forEach(function (item) {
          tmp = item.split("=");
          if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
    return result;
}

function onOptionClick(langName){
    for(var i =0; i < langs.length; i++){
        let obj = langs[i];
        if(obj.langName == langName){
            if ($('#'+obj.name).length != 0) {
                $('#'+obj.name).text("");
                ($('#'+obj.name)[0]).insertAdjacentHTML('beforeend',obj.text);
            }
                
        }
    }
}
$(document).ready(function(){

    

    $.ajax({
        url: "/info_translation",
    }).done(function(data) {
        //var langs = {}; /////
        var translations = JSON.parse(data);
        langs = translations;
        let firstValue = null;
        var names = [];
        $('#webmenu').append($('<option selected disabled data-image="/images/earth-icon-2.png"></option>'));
        for(var i = 0; i < translations.length; i++){
            if (!(names.includes(translations[i].langName))) {
                let langName = translations[i].langName;
                let picturePath = translations[i].picturePath;          

                if (translations[i].priority === 1) {
                    $('#webmenu').append($('<option value="'+langName+'" data-image="'+picturePath+'">'+langName+'</option>'));
                    $('.langs').append($('<div value="'+langName+'"><img src="'+picturePath+'">'+langName+'</div>'));
                }
                else if (translations[i].priority === 2) {
                    $('#webmenu').append($('<option value="'+langName+'" data-image="'+picturePath+'">'+langName+'</option>'));
                }

                names.push(translations[i].langName);
                        
                if(firstValue == null)
                    firstValue = langName;
            }
        }
        onOptionClick(firstValue);

        $('#webmenu').on('change', function() {
            onOptionClick(this.value);
        });

        $('.langs div').on('click', function() {
            onOptionClick(this.value);
        });



        try {
            $("body select[id='webmenu']").msDropDown();
        } catch(e) {
            alert(e.message);
        }
    });

    
    
});