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

function geLocalities(options) {

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

    for(var i =0; i < filtersLangs.length; i++){
        let obj = filtersLangs[i];
        if(obj.langName == langName){
            if ($('#'+obj.name).length != 0) {
                $('#'+obj.name).text("");
                ($('#'+obj.name)[0]).insertAdjacentHTML('beforeend',obj.text);
                if (($('#'+obj.name+'1').length != 0)) {
                    $('#'+obj.name+'1').text("");
                    ($('#'+obj.name+'1')[0]).insertAdjacentHTML('beforeend',obj.text);
                }
            }
                
        }
    }
    

    $("#organizationChoice").empty();
    $("#countryChoice").empty();

    $('table').find("tr:gt(0)").remove(); 
    var table = document.querySelector('table');
    var options = [];



    for(var i =0; i < langs.length; i++){
        let obj = langs[i];
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


        var tr = document.createElement('tr');
        tr.className = "notFirst";
        for (var j = 0; j < options[i].length; j++) {
            var td = document.createElement('td');
            td.innerHTML = options[i][j];
            tr.appendChild(td);
        }
        table.appendChild(tr);
    }


    $('#organizationChoice').multiselect('rebuild');
    $('#countryChoice').multiselect('rebuild');

    geLocalities(options);

    $('#countryChoice').on('change', function() {
        geLocalities(options);
    });
    
}




$(document).ready(function(){

    

    $.ajax({
        url: "/api/tableuniversity",
    }).done(function(data) {
        //var langs = {}; /////
        var translations = JSON.parse(data);
        console.log(data);
        langs = translations[0];

        filtersLangs = translations[1];

        let firstValue = null;
        var names = [];
        for(var i = 0; i < translations[0].length; i++){
            //let orgName = translations[i].organization;
            
            if (!(names.includes(translations[0][i].langName)))
            {
                let langName = translations[0][i].langName;
                let picturePath = translations[0][i].picturePath;
                // let orgName = translations[i].organization;
                // let countryName = translations[i].country;

                $('#webmenu').append($('<option value="'+langName+'" data-image="'+picturePath+'">'+langName+'</option>'));


                names.push(translations[0][i].langName);
                if(firstValue == null)
                    firstValue = langName;
            }
        
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