var langs = {};

function onOptionClick(langName){
    console.log(1);
    for(var i =0; i < langs.length; i++){
        let obj = langs[i];
        if(obj.langName == langName){
            // $('#textBody').text(obj.text);
            $('#textBody').text("");
            ($('#textBody')[0]).insertAdjacentHTML('beforeend',obj.text);
        }
    }
}
$(document).ready(function(){

    

    $.ajax({
        url: "/api/langs?id=99999"
    }).done(function(data) {
        var translations = JSON.parse(data);
        langs = translations;
        let firstValue = null;
        for(var i = 0; i < translations.length; i++){
            
            let langName = translations[i].langName;
            let picturePath = translations[i].picturePath;
            $('#webmenu').append($('<option value="'+langName+'" data-image="'+picturePath+'">'+langName+'</option>'));     
            if(firstValue == null)
                firstValue = langName;
        }
        onOptionClick(firstValue);

        $('#webmenu').on('change', function() {
            onOptionClick(this.value);
        });

        try {
            $("body select[id='webmenu']").msDropDown();
        } catch(e) {
            alert(e.message);
        }
    });

    
    
});