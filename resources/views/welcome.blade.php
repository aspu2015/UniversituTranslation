<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Multilang</title>

        <!-- js -->
        <script src="{{ asset('js/libs/jquery.js')}}"></script>
        <script src="{{ asset('js/libs/bootstrap.js')}}"></script>
        <script src="{{ asset('js/libs/summernote.js')}}"></script>

        <script src="https://api-maps.yandex.com/2.1/?apikey=1f0064eb-6c20-41d7-87b9-c25967a30cd1&lang=ru_RU" type="text/javascript">
        </script>

        
        <link rel="stylesheet" type="text/css" href="{{ asset('css/dd.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/skin2.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/flags.css') }}" />
        <script src="{{ asset('js/langs/jquery.dd.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/langs/jquery.dd.min.js') }}" type="text/javascript"></script>
        <!-- <script src="{{ asset('js/langs/info_translations.js')}}"></script> -->
        <script src="{{ asset('js/langs/dictionary.js')}}"></script>


        <!-- 16.07.2019 multiselect (checkbox) -->
        <script src="{{ asset('bootstrap-multiselect-master/docs/js/prettify.min.js')}}"></script>
        <script src="{{ asset('bootstrap-multiselect-master/dist/js/bootstrap-multiselect.js')}}"></script>
        <link href="{{ asset('bootstrap-multiselect-master/docs/css/prettify.min.css')}}" rel="stylesheet">
        <link href="{{ asset('bootstrap-multiselect-master/dist/css/bootstrap-multiselect.css')}}" rel="stylesheet">
        <link href="{{ asset('bootstrap-multiselect-master/docs/css/bootstrap-3.3.2.min.css')}}" rel="stylesheet">
        <!-- 16.07.2019 multiselect (checkbox) -->


        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->

        <!-- Styles -->
        <style>
            #textBody, #textBody2{text-align:left; font-size:16px;}
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 35px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 10px;
                margin-top: 20px;
            }
            
            .myhr {
                size: 2px;
                color: #ff6b6f;
            }

            .languagesField {
                margin-bottom: 30px;
            }

            .languagesField div {
                display: inline-block;
            }

            .choose-lang-div {
                margin-left: 30px;
            }

            .choose-lang-div span {
                font-size: 16px;
            }

            .choose-lang-div div {
                display: block;
                cursor: pointer;
            }

            .langs {
                margin-top: 20px;
                margin-bottom: 10px;
            }

            .langs div {
                display: inline-block;
                padding-right: 25px;
                padding-left: 25px;
                font-size: 16px;
            }

            .langs div img {
                display: block;
                padding-right: 5px;
                padding-left: 5px;
                cursor: pointer;
            }

            .langs div img:hover {
                -webkit-filter: drop-shadow(3px 5px 5px #7ac8ff);
                filter: drop-shadow(3px 5px 5px #7ac8ff);
            }

            .filtersGroups {
                height: 100px;
            }

            .filtersGroups .filtersSubmit {
                display: inline-block; 
            }

            .filters {
                padding-top: 10px;
                /* margin-left: auto; */
                /* margin-right: auto; */
                width: 85%;
                height: 100px;
                font-size: 16px;
                background-color: #f2f2f2;
                float: left;
                /* border: 3px dashed #636b6f; */
            }

            .filters div {
                display: inline-block;
            }

            #allOrganizations a:link, a:visited {
                /* background-color: #f75231; */
                background-color: #3685f4;
                color: white;
                padding: 10px 35px;
                margin-bottom: 30px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 18px;
                border-radius: 8px;
            }

            #allOrganizations a:hover, a:active {
                background-color: #0050bf;
            }

            .filtersSubmit {
                width: 15%;
                height: 100px;
                background-color: #3685f4;
                font-size: 18px;
                color: white;
            }

            .filtersSubmit:hover{
                background-color: #0050bf;
            }

            #hint {
                float: left;
                margin-left: 20px;
                margin-bottom: 20px;
                font-weight: bold;
            }

        </style>
    </head>
    <body>
        <script src="{{ asset('js/map/yandexMap.js')}}"></script>
        <div class="flex-center position-ref full-height">
            <!-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif -->

            <div class="content">
                <div class="title m-b-md">
                Мультиязычный сайт для поддержки единого
                 научно-образовательного пространства Каспийского региона
                    <!-- Мультиязычный сайт по совокупности 
                    образовательных, академических, 
                    функционально смежных для них организаций
                    Прикаспийских и иных государств -->
                </div>
                
                <div class="languagesField">Выберите язык
                    <div class="langs"></div>
                    <div class="choose-lang-div">
                        <select id="webmenu"  name = "webmenu">
                    
                        </select>
                        <span id="chooseLang"></span>
                    </div>
                    
                </div>
                <br>
                
                <div id="allOrganizations">
                    <a href="{{ url('/universitytable') }}">Все организации</a>
                </div>
                <!-- <hr> -->
                <!-- <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                <div id="textBody"></div>
                 </div></div></div> -->
                <!-- <hr> -->

                <div class="filtersGroups">
                <div class="filters">
                <span id="hint">Для выбора группы организаций используйте фильтры</span><br>
                <div id="org"><span id="orgType"></span>
                <select id="organizationChoice" multiple="multiple">
                @foreach ($organizations as $item)   
                    <option value="{{$item->id}}" selected="selected"> {{$item->name}}</option>
                @endforeach
                </select>
                </div>



                <div id="countrych" style="padding-left: 20px;"><span id="countryName"></span>
                <select id="countryChoice" multiple="multiple">
                @foreach ($country as $item)   
                    <option value="{{$item->id}}" selected="selected"> {{$item->name}}</option>
                @endforeach
                </select>
                </div>
                </div>
                <button class="filtersSubmit">Выбрать</button>
                <!-- <div class=""><span id="filterSubmit"></span></div> -->
                </div>
                
                




                <div id="map" style="width: 100%; height: 400px"></div>
                <hr>
                <!-- <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                <div id="textBody2"></div>
        </div></div></div> -->
                <script type="text/javascript">
                $(document).ready(function() {
                    $('#organizationChoice').multiselect();
                    $('#countryChoice').multiselect();
                });
                </script>

                




            </div>
            
        </div>
    </body>
</html>
