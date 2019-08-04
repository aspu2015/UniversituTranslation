$(document).ready(function(){
    
    getTable();
    //$('#org').click(getTable);
    //$('#countrych').click(getTable);
    $('#accept').click(getTable);


        function getTable() {  


            var selectedOrganization = document.querySelectorAll('#org .multiselect-native-select .btn-group'+
            ' ul li[class="active"] a label input[value]');
            var selectedCountry = document.querySelectorAll('#countrych .multiselect-native-select .btn-group'+
            ' ul li[class="active"] a label input[value]');
            var selectedLocality = document.querySelectorAll('#localitych .multiselect-native-select .btn-group'+
            ' ul li[class="active"] a label input[value]');
            var selectedOrgArray = [];
            var selectedCountryArray = [];
            var selectedLocalityArray = [];
            
            //console.log(selectedOrganization);
            //console.log(selectedCountry);

            for (var i = 0; i < selectedOrganization.length; i++) {
                selectedOrgArray.push(selectedOrganization[i].value);
            }
            for (var i = 0; i < selectedCountry.length; i++) {
                selectedCountryArray.push(selectedCountry[i].value);
            }
            for (var i = 0; i < selectedLocality.length; i++) {
                selectedLocalityArray.push(selectedLocality[i].value);
            }


            var table = $('table');
            var trs = $('tr', table);
            var option = [];
            trs.each(function(){
                option.push($('td',this));
            });

            //console.log(option);


            for (var i = 1; i < option.length; i++) {
                if (selectedOrgArray.indexOf($.trim(option[i].eq(1).html())) != -1 && 
                selectedCountryArray.indexOf($.trim(option[i].eq(2).html())) != -1 &&
                selectedLocalityArray.indexOf($.trim(option[i].eq(3).html())) != -1)
                    $(trs[i]).show();
                else $(trs[i]).hide();

                // в условии привязка к индексам столбцов
            }         


    }
});

