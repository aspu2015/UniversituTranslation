//var langs = {};
// function findGetParameter(parameterName) {
//     var result = null,
//         tmp = [];
//     location.search
//         .substr(1)
//         .split("&")
//         .forEach(function (item) {
//           tmp = item.split("=");
//           if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
//         });
//     return result;
// }

function onOptionClick(langName){
    console.log('Языки: ',langs);
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
<<<<<<< HEAD
        url: "/api/langs?id=99999"
=======
        url: "/api/langs?id=9999"
>>>>>>> 98ed5fb4c9d7235a18eeedeb0c001d4f81d31f60
    }).done(function(data) {
        var translations = JSON.parse(data);
        langs = translations;
        let firstValue = null;
        for(var i = 0; i < translations.length; i++){
            let langName = translations[i].langName;
            let picturePath = translations[i].picturePath;
            $('#langs').append($('<div value="'+langName+'"><img src="'+picturePath+'">'+langName+'</div>'));
            $('#webmenu').append($('<option value="'+langName+'" data-image="'+picturePath+'">'+langName+'</option>'));     
            if(firstValue == null)
                firstValue = langName;
        }

        onOptionClick(firstValue);

        $('#webmenu').on('change', function() {
            onOptionClick(this.value);
        });
        
        $('body .choose-lang-div #langs div').click(onOptionClick(this.value));

        try {
            $("body select[id='webmenu']").msDropDown();
        } catch(e) {
            alert(e.message);
        }
    });

    
});