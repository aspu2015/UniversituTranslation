<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ASU</title>

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
        <link rel="stylesheet" type="text/css" href="{{ asset('css/dd.css') }}"/>
        <script src="{{ asset('js/langs/translations.js')}}"></script>

        <!-- 16.07.2019 multiselect (checkbox) -->
        <script src="{{ asset('bootstrap-multiselect-master/docs/js/prettify.min.js')}}"></script>
        <script src="{{ asset('bootstrap-multiselect-master/dist/js/bootstrap-multiselect.js')}}"></script>
        <link href="{{ asset('bootstrap-multiselect-master/docs/css/prettify.min.css')}}" rel="stylesheet">
        <link href="{{ asset('bootstrap-multiselect-master/dist/css/bootstrap-multiselect.css')}}" rel="stylesheet">
        <link href="{{ asset('bootstrap-multiselect-master/docs/css/bootstrap-3.3.2.min.css')}}" rel="stylesheet">
        <!-- 16.07.2019 multiselect (checkbox) -->


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                /* text-decoration: none; */
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #langs div {
                display: inline-block;
                padding-right: 10px;
                padding-left: 10px;
                font-size: 18px;
                cursor: pointer;
            }

            #langs div img {
                padding-left: 5px;
                padding-right: 5px;
            }          

        </style>
    </head>
    <body>
        <script src="{{ asset('js/langs/info_translations.js')}}"></script>
        <script src="{{ asset('js/map/yandexMap.js')}}"></script>
        
        

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
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
            @endif
            
            

            <div class="content">
                <div class="title m-b-md">
                    Universities
                </div>


                <div class="choose-lang-div">
                    <div id="langs"></div>
                    <p class="chooseLang" >Choose your Language: </p>
                    <select id="webmenu"  name = "webmenu">
                    
                    </select>
                </div>
                <hr>

                <a href="{{ url('/universitytable') }}">Список организаций</a>
                <hr>

                <div id="textBody"></div>
                <hr>


                <div id="org"> Тип организации
                <select id="organizationChoice" multiple="multiple">
                @foreach ($organizations as $item)   
                    <option value="{{$item->id}}" selected="selected"> {{$item->name}}</option>
                @endforeach
                </select>
                </div>
                <hr>

                <div id="countrych"> Страна
                <select id="countryChoice" multiple="multiple">
                @foreach ($country as $item)   
                    <option value="{{$item->id}}" selected="selected"> {{$item->name}}</option>
                @endforeach
                </select>
                </div>

                <hr>




                <div id="map" style="width: 600px; height: 400px"></div>
                

                <script type="text/javascript">
                $(document).ready(function() {
                    $('#organizationChoice').multiselect({buttonWidth: '150px'});
                    $('#countryChoice').multiselect({buttonWidth: '150px'});
                });
                </script>

                




            </div>
            
        </div>
    </body>
</html>
