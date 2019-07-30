$(document).ready(function(){
    ymaps.ready(init);
    function init () {
        var myMap = new ymaps.Map('map', {
                center: [41.721726, 50.825439],
                zoom: 5,
                controls: ['geolocationControl']
            }, {
                searchControlProvider: 'yandex#search',
                yandexMapDisablePoiInteractivity: true,
                maxZoom: 6,
            }),

            clusterer = new ymaps.Clusterer({
                preset: 'islands#redClusterIcons',
                groupByCoordinates: false,
                clusterDisableClickZoom: true,
                clusterHideIconOnBalloonOpen: false,
                geoObjectHideIconOnBalloonOpen: false
            });

            // var script;
            //     // Получим ссылки на элементы с тегом 'head' и id 'language'.
            //     var head = document.getElementsByTagName('head')[0];
            //     var select = document.getElementById('webmenu');

            //     select.createMap = function () {
            //         // Получим значение выбранного языка.
            //         var language = this.value;
            //         console.log(language);
            //         // Если карта уже была создана, то удалим её.
            //         if (myMap) {
            //             myMap.destroy();
            //         }
            //         // Создадим элемент 'script'.
            //         script = document.createElement('script');
            //         script.type = 'text/javascript';
            //         script.charset = 'utf-8';
            //         // Запишем ссылку на JS API Яндекс.Карт с выбранным языком в атрибут 'src'.
            //         script.src = 'https://api-maps.yandex.ru/2.1/?onload=init_' + language + '&lang=' + language +
            //             '_RU&ns=ymaps_' + language;
            //         // Добавим элемент 'script' на страницу.
            //         head.appendChild(script);
            //         // Использование пространства имен позволяет избежать пересечения названий функций
            //         // и прочих программных компонентов.
            //         window['init_' + language] = function () {
            //             init(window['ymaps_' + language]);
            //         }
            //     };
            //     getPlaceMark();
            //     //$('.multiselect-native-select .btn-group ul li a label input').click(getPlaceMark);
            //     $('#webmenu').on('change', function() {
            //         select.createMap();
            //     });
                // Назначим обработчик для события выбора языка из списка.
                //$('.multiselect-native-select .btn-group ul li a label input').click(select.createMap);
                //document.getElementById('webmenu').addEventListener("change", select.createMap);
                // Создадим карту и зададим для нее язык, который был выбран по умолчанию.
        
        getPlaceMark();
       
        $('.multiselect-native-select .btn-group ul li a label input').click(getPlaceMark);
         

        function getPlaceMark() {
       

        $.ajax({
            url: "/api/geodata"
        }).done(function(data) {

            myMap.geoObjects.removeAll(); /// удаляем метки перед созданием новых ///
            clusterer.removeAll();

            var selectedOrganization = document.querySelectorAll('#org .multiselect-native-select .btn-group'+
            ' ul li[class="active"] a label input[value]');
            var selectedCountry = document.querySelectorAll('#countrych .multiselect-native-select .btn-group'+
            ' ul li[class="active"] a label input[value]');
            var selectedOrgArray = [];
            var selectedCountryArray = [];
            for (var i = 0; i < selectedOrganization.length; i++) {
                selectedOrgArray.push(+selectedOrganization[i].value);
            }
            for (var i = 0; i < selectedCountry.length; i++) {
                selectedCountryArray.push(+selectedCountry[i].value);
            }
            //console.log(selectedOrgArray);
            //console.log(selectedCountryArray);


            data = JSON.parse(data);
            //console.log(data);            
            let geodata = [];
            for(var i = 0; i < data.features.length; i++){
                if (selectedOrgArray.indexOf(data.features[i].organization) != -1
                && selectedCountryArray.indexOf(data.features[i].country) != -1) {
                geodata[i] = new ymaps.Placemark(data.features[i].geometry.coordinates, 
                    data.features[i].properties, 
                    {clusterDisableClickZoom: true,
                        iconLayout: 'default#image',
                        iconImageHref: 'staticImages/flag.png',
                        visible: true                       
                    }); 

                    clusterer.add(geodata[i]);
                }
            }
            myMap.geoObjects.add(clusterer);
        });
    }

    }
});
