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

    

    $("#organizationChoice").empty();
    $("#countryChoice").empty();

    $('table').find("tr:gt(0)").remove(); 
    var table = document.querySelector('table');
    var options = [];



    for(var i =0; i < langs.length; i++){
        let obj = langs[i];
        console.log(obj);
        if(obj.langName == langName){
            for (var j=0; j < 5; j++)       // WTF ?! ///////////////////////
                if (j == 0) options.push([
                    obj.name,
                    //obj.shortDescription,
                    obj.organization,
                    obj.country,
                    '<a href="'+obj.site_URL+'">'+obj.site_URL+'</a>'
                ]);
            
        }
    }


    var filters = [];
    //console.log(options);
    for (var i = 0; i < options.length; i++) {
        console.log(options);

        

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
}


$(document).ready(function(){

    

    $.ajax({
        url: "/api/tableuniversity",
    }).done(function(data) {
        //var langs = {}; /////
        var translations = JSON.parse(data);
        langs = translations;
        let firstValue = null;
        var names = [];
        for(var i = 0; i < translations.length; i++){
            //let orgName = translations[i].organization;
            
            if (!(names.includes(translations[i].langName)))
            {
                let langName = translations[i].langName;
                let picturePath = translations[i].picturePath;
                // let orgName = translations[i].organization;
                // let countryName = translations[i].country;

                $('#webmenu').append($('<option value="'+langName+'" data-image="'+picturePath+'">'+langName+'</option>'));


                names.push(translations[i].langName);
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