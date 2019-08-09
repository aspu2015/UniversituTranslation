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
        if (selectedCountryArray.includes(String(options[v][5]))) {
            $('#localityChoice').append($('<option value="'+options[v][6]+'" selected="selected">'+options[v][3]+'</option>'));
        }
    }

    /////////////// пофиксить фильтры ///// убрать привязку к индексам в массиве options ////////////////
    if ($('#localityChoice').length != 0) $('#localityChoice').multiselect('rebuild');
    
    
}

function onOptionClick(langName){
    
    //window.location.hash = "#!"+langName;
    //$('#webmenu option').setAttribute('hidden', 'hidden');
    //history.replaceState({param: 'Value'}, '', '/'+langName);
    

    for(var i =0; i < langs.length; i++){
        let obj = langs[i];
        if(obj.langName == langName){
            if ($('#'+obj.tagName).length != 0) {
                $('#'+obj.tagName).text("");
                ($('#'+obj.tagName)[0]).insertAdjacentHTML('beforeend',obj.text);
            }
                
        }
    }

    
    var news = $('#news div');
    news.remove();


    for(var i =0; i < newsTranslations.length; i++){
        let obj = newsTranslations[i];
        var news_title = obj.news_title;
        var news_text = obj.news_text;
        if (langName != 'Русский') langName = 'English'; /// костыль - починить. 
                                          ///          Для всех языков кроме русского новости на английском
        if (obj.langName == langName){
            $('#news').append($(
                '<div class="newsContainer"><div class="newsTitle">'+news_title+'</div><br>'+
                '<div class="newsText">'+news_text+'</div><hr class="newshr"></div>'));
        }    
    }

    if ($('.news').length != 0  && $('#titleBlock').length) {
        var heightDiv = $('.news').height() + 360;
        $('#titleBlock')[0].style.marginTop = heightDiv+"px";
    }
    ///////////////////////////////////////
    

        $("#organizationChoice").empty();
        $("#countryChoice").empty();
    
        var options = [];
    
    
    
        for(var i =0; i < filtersLangs.length; i++){
            let obj = filtersLangs[i];
/////////////// пофиксить фильтры /////  //////////////// push добавить ключи
            if(obj.langName == langName){
                for (var j=0; j < 5; j++)       // WTF ?! ///////////////////////
                    if (j == 0) options.push([
                        obj.name,
                        //obj.shortDescription,
                        obj.organization,
                        obj.country,
                        obj.locality,
                        obj.organization_id,
                        obj.country_id,
                        obj.locality_id,
                        '<a href="'+obj.site_URL+'">'+obj.site_URL+'</a>'
                    ]);
                
            }
        }
    
        var filters = [];
        console.log(options);
        for (var i = 0; i < options.length; i++) {
    
            /////////////// пофиксить фильтры ///// убрать привязку к индексам в массиве options ////////////////
            
            if (!(filters.includes(options[i][1]))) {
                $('#organizationChoice').append($('<option value="'+options[i][4]+'" selected="selected">'+options[i][1]+'</option>'));
                filters.push(options[i][1]);
            }
    
            if (!(filters.includes(options[i][2]))) {
                $('#countryChoice').append($('<option value="'+options[i][5]+'" selected="selected">'+options[i][2]+'</option>'));
                filters.push(options[i][2]);
            }
    
        }
    
        if ($('#organizationChoice').length != 0) $('#organizationChoice').multiselect('rebuild');
        
        if ($('#countryChoice').length != 0) $('#countryChoice').multiselect('rebuild');
    
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
        //console.log(translations[0]);
        langs = translations[0];
   
        filtersLangs = translations[1];
        newsTranslations = translations[2];
        
 

        let firstValue = null;
        var names = [];
        if (location.pathname != '/contacts' || location.pathname != '/allTheNews'){
            $('#webmenu').append($('<option id="earth" selected disabled data-image="/images/earth-icon-2.png"></option>'));
        }
        for(var i = 0; i < translations[0].length; i++){
            if (!(names.includes(translations[0][i].langName))) {
                let langName = translations[0][i].langName;
                let picturePath = translations[0][i].picturePath;
                // if (location.pathname != '/contacts'){ 
                if (translations[0][i].priority == '1') {
                    $('.langs').append($('<div value="'+langName+'"><img src="'+picturePath+'">'+langName+'</div>'));
                }
                else if (translations[0][i].priority == '2') {
                    $('#webmenu').append($('<option value="'+langName+'">'+langName+'</option>'));
                    //$('#webmenu').append($('<option value="'+langName+'" data-image="'+picturePath+'">'+langName+'</option>'));
                }
                // } 
                // else $('#webmenu').append($('<option value="'+langName+'">'+langName+'</option>'));
                names.push(translations[0][i].langName);
                        
                if(firstValue == null)
                    firstValue = langName;
            }
        }
        
        if (location.pathname != '/contacts' || location.pathname != '/allTheNews') onOptionClick("Русский");
        else onOptionClick("English");
        // $('.langs div[value="Русский"]').attr('value')

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