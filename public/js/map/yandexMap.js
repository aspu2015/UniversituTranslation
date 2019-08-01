$(document).ready(function(){
    ymaps.ready(init);
    function init () {
        var myMap = new ymaps.Map('map', {
                center: [42.591726, 50.825439],
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

        

            var colors = ['#F0F075', '#FB6C3F', '#3E5CAD', '#49C0B5', '#ED9D2D', '#36C755'];

            var objectManager = new ymaps.ObjectManager();
            // Загрузим регионы.
            ymaps.borders.load('001', {
                lang: 'ru',
                quality: 2
            }).then(function (result) {
                // Очередь раскраски.
                var queue = [];
                //delete result.features[0];
                //console.log(result.features);
                //console.log(result.features[0].properties.iso3166);
                // Создадим объект regions, где ключи это ISO код региона.
                var regions = result.features.reduce(function (acc, feature) {
                    
                    // Добавим ISO код региона в качестве feature.id для objectManager.
                    var iso = feature.properties.iso3166;
                    feature.id = iso;
                    // Добавим опции региона по умолчанию.
                    feature.options = {
                        fillOpacity: 0.6,
                        strokeColor: '#FFF',
                        strokeOpacity: 0.5
                    };
                    acc[iso] = feature;
                    return acc;
                }, {});

                console.log(regions);

        
                // Функция, которая раскрашивает регион и добавляет всех нераскрасшенных соседей в очередь на раскраску.
                function paint(iso) {
                    
                    // console.log(regions,'---',typeof(regions));
                    
                    // console.log(regions,'---',typeof(regions));
                    // var availableRegions = ['RU', 'KZ', 'TM', 'AZ', 'IR'];
                    // for (key in regions) {
                    //     if (!(availableRegions.indexOf(key) != -1)) {
                    //         //console.log(key);
                    //         delete regions[key];
                    //     }                   
                    // }

                    //console.log(iso);
                    var allowedColors = colors.slice(0, colors.length);
                    console.log(allowedColors);
                    // Получим ссылку на раскрашиваемый регион и на его соседей.
                    var region = regions[iso];
                    var neighbors = region.properties.neighbors;
                    // Если у региона есть опция fillColor, значит мы его уже раскрасили.
                    if (region.options.fillColor) {
                        return;
                    }
                    // Если у региона есть соседи, то нужно проверить, какие цвета уже заняты.
                    if (neighbors.length !== 0) {
                        neighbors.forEach(function (neighbor) {
                            var fillColor = regions[neighbor].options.fillColor;
                            // Если регион раскрашен, то исключаем его цвет.
                            if (fillColor) {
                                var index = allowedColors.indexOf(fillColor);
                                if (index != -1) {
                                    allowedColors.splice(index, 1);
                                }
                                // Если регион не раскрашен, то добавляем его в очередь на раскраску.
                            } else if (queue.indexOf(neighbor) === -1) {
                                queue.push(neighbor);
                            }
                        });
                    }
                    // Раскрасим регион в первый доступный цвет.
                    region.options.fillColor = allowedColors[0];
                }
                for (var iso in regions) {
                    // Если регион не раскрашен, добавим его в очередь на раскраску.
                    if (!regions[iso].options.fillColor) {
                        queue.push(iso);
                    }
                    
                    // Раскрасим все регионы из очереди.
                    while (queue.length > 0) {
                        paint(queue.shift());
                    }
                }
                // Добавим регионы на карту.
                result.features = [];
                for (var reg in regions) {
                    result.features.push(regions[reg]);
                }
                objectManager.add(result);
                myMap.geoObjects.add(objectManager);
            })

        getPlaceMark();
       
        //$('.multiselect-native-select .btn-group ul li a label input').click(getPlaceMark);
        $('.filtersSubmit').click(getPlaceMark); 

        function getPlaceMark() {
       

        $.ajax({
            url: "/api/geodata"
        }).done(function(data) {

            myMap.geoObjects.remove(clusterer); /// удаляем метки перед созданием новых ///
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
