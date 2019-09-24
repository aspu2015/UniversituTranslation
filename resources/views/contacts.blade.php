<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/libs/jquery.js')}}"></script>
    <script src="{{ asset('js/libs/bootstrap.js')}}"></script>
    <script src="{{ asset('js/libs/summernote.js')}}"></script>


    <!-- <script src="{{ asset('js/allUniversityTable/filter.js')}}"></script> -->
    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/dd.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/skin2.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flags.css') }}" />
    <script src="{{ asset('js/langs/jquery.dd.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/langs/jquery.dd.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/langs/dictionary.js')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layoutCss/layout.css') }}" rel="stylesheet">
    

    <style>
        .card-body div{
            display: inline-block;
            /* padding-bottom: 20px; */
            margin: 5px;
            margin-bottom: 15px;
        }


        /* .card-body div button{
            margin-left: 80px;
        } */

        #filters{
            font-weight: bold;
        }

        .notFirst:hover {
            background-color: #ced2db;
        }

        #webmenu {
            width: 130px;
        }

        .languagesField {
                margin-bottom: 5px;
                max-height: 100px;
            }

            .languagesField div {
                display: inline-block;
            }

            .choose-lang-div {
            }

            .choose-lang-div span {
                font-size: 16px;
            }

            .choose-lang-div div {
                display: block;
                cursor: pointer;
            }

            .langs {
                margin-top: 10px;
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

    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span id="linkMain"></span>
                </a>
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
                

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                </div>
            </div>
        </nav>

        <main class="py-4">
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <br>

                    <div>
                        <span id="ourContacts" style="font-weight: bold;
                        font-size: 18px;">
                        </span>
                        <br>
                        <span id="ContactsInfo" style="font-size: 18px;">
                        </span>
                    </div>

                             
                </div>
            </div>
        </div>
    </div>
</div>
        </main>
    </div>
</body>
</html>