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

function getLocalities(options) {

    $("#localityChoice").empty();

    var selectedCountry = document.querySelectorAll('#countrych .multiselect-native-select .btn-group'+
            ' ul li[class="active"] a label input[value]');
    var selectedCountryArray = [];
    for (var i = 0; i < selectedCountry.length; i++) {
        selectedCountryArray.push(selectedCountry[i].value);
    }

    for(var v = 0; v < options.length; v++) {
        if (selectedCountryArray.includes(options[v][2])) {
            $('#localityChoice').append($('<option value="'+options[v][3]+'" selected="selected">'+options[v][3]+'</option>'));
        }
    }
    
    

    $('#localityChoice').multiselect('rebuild');
    
}

function onOptionClick(langName){

    //$('#webmenu option').setAttribute('hidden', 'hidden');

    for(var i =0; i < langs.length; i++){
        let obj = langs[i];
        if(obj.langName == langName){
            if ($('#'+obj.name).length != 0) {
                $('#'+obj.name).text("");
                ($('#'+obj.name)[0]).insertAdjacentHTML('beforeend',obj.text);
            }
                
        }
    }
    ///////////////////////////////////////
    

        $("#organizationChoice").empty();
        $("#countryChoice").empty();
    
        var options = [];
    
    
    
        for(var i =0; i < filtersLangs.length; i++){
            let obj = filtersLangs[i];
            //console.log(obj);
            if(obj.langName == langName){
                for (var j=0; j < 5; j++)       // WTF ?! ///////////////////////
                    if (j == 0) options.push([
                        obj.name,
                        //obj.shortDescription,
                        obj.organization,
                        obj.country,
                        obj.locality,
                        '<a href="'+obj.site_URL+'">'+obj.site_URL+'</a>'
                    ]);
                
            }
        }
    
        var filters = [];
        //console.log(options);
        for (var i = 0; i < options.length; i++) {
            //console.log(options);
    
            
    
            if (!(filters.includes(options[i][1]))) {
                $('#organizationChoice').append($('<option value="'+options[i][1]+'" selected="selected">'+options[i][1]+'</option>'));
                filters.push(options[i][1]);
            }
    
            if (!(filters.includes(options[i][2]))) {
                $('#countryChoice').append($('<option value="'+options[i][2]+'" selected="selected">'+options[i][2]+'</option>'));
                filters.push(options[i][2]);
            }
    
        }
    
    
        $('#organizationChoice').multiselect('rebuild');
        $('#countryChoice').multiselect('rebuild');
    
        getLocalities(options);
    
        $('#countryChoice').on('change', function() {
            getLocalities(options);
        });
        
}



$(document).ready(function(){

    

    $.ajax({
        url: "/info_translation",
    }).done(function(data) {
        //var langs = {}; /////
        var translations = JSON.parse(data);
        console.log(translations[0]);
        langs = translations[0];

        filtersLangs = translations[1];

        let firstValue = null;
        var names = [];
        $('#webmenu').append($('<option id="earth" selected disabled data-image="/images/earth-icon-2.png"></option>'));
        for(var i = 0; i < translations[0].length; i++){
            if (!(names.includes(translations[0][i].langName))) {
                let langName = translations[0][i].langName;
                let picturePath = translations[0][i].picturePath;
                if (translations[0][i].priority == '1') {
                    $('.langs').append($('<div value="'+langName+'"><img src="'+picturePath+'">'+langName+'</div>'));
                }
                else if (translations[0][i].priority == '2') {
                    $('#webmenu').append($('<option value="'+langName+'">'+langName+'</option>'));
                    //$('#webmenu').append($('<option value="'+langName+'" data-image="'+picturePath+'">'+langName+'</option>'));
                }

                names.push(translations[0][i].langName);
                        
                if(firstValue == null)
                    firstValue = langName;
            }
        }
        
        onOptionClick($('.langs div[value="Русский"]').attr('value'));
        

        $('#webmenu').on('change', function() {
            onOptionClick(this.value);
        });

        $('#webmenu').on('click', function() {
            $('#webmenu option[id="earth"]').attr('hidden', 'hidden');    
        });
        


        $('.langs div').on('click', function() {
            onOptionClick($(this).attr('value'));
            //onOptionClick(this.value);
        });



        try {
            $("body select[id='webmenu']").msDropDown();
        } catch(e) {
            alert(e.message);
        }
    });

    
    
});