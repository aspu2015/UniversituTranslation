var langs = {};


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

    $("#organizationChoice").empty();
    $("#countryChoice").empty();

    var options = [];



    for(var i =0; i < langs.length; i++){
        let obj = langs[i];
        //console.log(obj);
        if(obj.langName == langName){
            for (var j=0; j < 5; j++)       // WTF ?! ///////////////////////
                if (j == 0) options.push([
                    obj.name,
                    obj.organization,
                    obj.country,
                    obj.locality,
                ]);
            
        }
    }
    console.log(options);
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
        url: "/api/tableuniversity",
    }).done(function(data) {
        var translations = JSON.parse(data);
        langs = translations;
        let firstValue = null;

        firstValue = 'Русский';
 
        console.log('1111111111');

        onOptionClick(firstValue);

        $('#webmenu').on('change', function() {
            onOptionClick(this.value);
        });


    });
    
    
});