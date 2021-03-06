<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="yandex-verification" content="3a76a2fa26237702" />
	<meta name="google-site-verification" content="0k7DAqKVa9rJ4CBGd9g5VB08RVGMQW96d0_58OH4rYw" />
        <title>Multilang</title>

        <!-- js -->
        <script src="{{ asset('js/libs/jquery.js')}}"></script>
        <script src="{{ asset('js/libs/bootstrap.js')}}"></script>
        <script src="{{ asset('js/libs/summernote.js')}}"></script>

        <script src="https://api-maps.yandex.com/2.1/?apikey=1f0064eb-6c20-41d7-87b9-c25967a30cd1&lang=en_US" type="text/javascript">
        </script>

        
        <link rel="stylesheet" type="text/css" href="{{ asset('css/dd.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/skin2.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/flags.css') }}" />
        <script src="{{ asset('js/langs/jquery.dd.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/langs/jquery.dd.min.js') }}" type="text/javascript"></script>
        <!-- <script src="{{ asset('js/langs/info_translations111.js')}}"></script> -->
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



            body {
                /* background-color: #fffff2; */

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
                position: relative;
                margin-top: 800px;
                align: right;
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
                margin-bottom: 20px;
            }

            .filtersGroups .filtersSubmit {
                display: inline-block; 
            }

            .filters {
                /* border-top: 1px dashed black; */
                /* margin-left: auto; */
                /* margin-right: auto; */
                width: 100%;
                height: 100px;
                font-size: 16px;
                background-color: #f2f2f2;
                float: left;
                /* border: 3px dashed #636b6f; */
                padding-top: 30px;
            }

            .filters div {
                display: inline-block;
                padding-right: 30px;
            }

            #orgType, #countryName, #localityName {
                font-weight: bold;
            }

            .buttonLink a:link, a:visited {
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

            .buttonLink a:hover, a:active {
                background-color: #0050bf;
            }

            .filtersSubmit {
                width: 130px;
                height: 45px;
                background-color: #3685f4;
                font-size: 18px;
                color: white;
                border-radius: 15px;
                outline: none;
                margin-left: 70px;
            }

            .filtersSubmit:hover{
                background-color: #0050bf;
            }

            #hint {
                float: left;
                margin-left: 20px;
                /* margin-bottom: 20px; */
                font-weight: bold;
                font-size: 16px;
            }

            .newshr {
                /* border-top: 5px solid #eee; */
                height: 8px;
                background-image: linear-gradient(90deg, #6970f9, transparent);
                border: 0;
                height: 3px;
            }

            .newsTitle {
                font-size: 20px;
                font-weight: bold;
                text-align: left;
            }

            .newsText {
                text-align: left;
            }

            .newsContainer {
                margin-left: 200px;
                margin-right: 200px;
                padding-right: 30px;
                padding-top: 10px;
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
            
            <div class="content" style="width: 100%;">
            
                <div id="titleBlock" class="title m-b-md" style="text-align: left; 
                 margin-bottom: 30px;
                 position: relative; margin-left: 120px;">
                 <img src="/images/kasp.png" style="width: 70px;
                 display: inline-block; float: left; margin-right: 30px;">
                 <span id="titleSite"></span>
                    <!-- Мультиязычный сайт по совокупности 
                    образовательных, академических, 
                    функционально смежных для них организаций
                    Прикаспийских и иных государств -->
                   
                </div>
                
                
                <div class="languagesField">
                    <span id="ChooseLangSpan" style="font-weight: bold; font-size: 16px;">
                        
                    </span>
                    <div class="langs"></div>
                    <div class="choose-lang-div">
                        <select id="webmenu"  name = "webmenu">
                            
                        </select>
                        <span id="chooseLang"></span>
                    </div>
                    
                </div>
                <br>
                
                <div class="buttonLink">
                    <a href="{{ url('/universitytable') }}"><span id="allOrganizations"></span></a>
                </div>
                <!-- <hr> -->
                <!-- <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                <div id="textBody"></div>
                 </div></div></div> -->
                <!-- <hr> -->

                <div class="filtersGroups">
                <span id="hint"></span><br>
                <div class="filters">
                
                <div id="org"><span id="orgType"></span>
                <select id="organizationChoice" multiple="multiple">
                
                </select>
                </div>



                <div id="countrych" style="padding-left: 20px;"><span id="countryName"></span>
                <select id="countryChoice" multiple="multiple">
                
                </select>
                </div>

                <div id="localitych"><span id="localityName"></span>
                <select id="localityChoice" multiple="multiple">  
                    
                </select>
                </div>
                <button class="filtersSubmit"><span id="applyFilters"></span></button>

                </div>
                
                <!-- <div class=""><span id="filterSubmit"></span></div> -->
                </div>
                
                




                <div id="map" style="width: 100%; height: 400px"></div>
                <br>
                <div class="contacts" style="margin-top: 40px;">
                <div class="buttonLink">
                    <a href="{{ url('/contacts') }}"><span id="contactInfo"></span></a>
                </div>
                </div>
                <div class="news">
                    <div style="margin-top: 40px;
                                font-weight: bold; 
                                font-size: 30px; 
                                width: 100%;
                                height: 80px;
                                background-color: #6970f9;
                                color: white;
                                padding-top: 20px;">
                        <span id="newsTitle"></span>
                    </div>
                       
                    <br><br>

                <div id="news">
                
                </div>
                <br> <a style="font-size: 22px; color: #335dd4;" href="{{ url('/allTheNews') }}"><span id="allTheNewsLink"></span></a>
                </div>
                <br><br>
                <div class="footer" style="width: 100%;
                                        height: 50px;
                                    background-color: #5b5d61;
                                    padding-top: 15px;
                                    color: white;">
                    <span id="copyright"></span>
                </div>
                <!-- <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                <div id="textBody2"></div>
        </div></div></div> -->
                <script type="text/javascript">
                $(document).ready(function() {
                    $('#organizationChoice').multiselect();
                    $('#countryChoice').multiselect();
                    $('#localityChoice').multiselect();
                });
                </script>

                




            </div>
            
        </div>
    </body>
</html>
