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
    <script src="{{ asset('js/allUniversityTable/filter.js')}}"></script>
    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layoutCss/layout.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap-multiselect-master/docs/js/prettify.min.js')}}"></script>
    <script src="{{ asset('bootstrap-multiselect-master/dist/js/bootstrap-multiselect.js')}}"></script>
    <link href="{{ asset('bootstrap-multiselect-master/docs/css/prettify.min.css')}}" rel="stylesheet">
    <link href="{{ asset('bootstrap-multiselect-master/dist/css/bootstrap-multiselect.css')}}" rel="stylesheet">
    <link href="{{ asset('bootstrap-multiselect-master/docs/css/bootstrap-3.3.2.min.css')}}" rel="stylesheet">

    <!-- <msdropdown> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dd.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/skin2.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flags.css') }}" />
    <script src="{{ asset('js/langs/jquery.dd.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/langs/jquery.dd.min.js') }}" type="text/javascript"></script>
    <!-- </msdropdown> -->

    <script src="{{ asset('js/langs/translations.js')}}"></script>

    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                    Главная
            </a>

                <div class="choose-lang-div">
                    <p class="chooseLang" >Choose your Language: </p>
                    <select id="webmenu"  name = "webmenu">
                    
                    </select>
                </div>
            </div>
            </div>
        </nav>

        <main class="py-4">
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-8">

        <div id="textBody" class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{!! session('status') !!}}
                        </div>
                    @endif


                </div>
            <div class="card">
                <div class="card-header">Университеты:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <br>

                    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Краткое описание</th>
                <th scope="col">Тип организации
                    <div id="org">
                        <select id="organizationChoice" multiple="multiple">
                        @foreach ($organizations as $item)   
                            <option value="{{$item->name}}" selected="selected">{{$item->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </th>
                <th scope="col">Страна
                    <div id="countrych">
                        <select id="countryChoice" multiple="multiple">
                        @foreach ($countries as $item)   
                            <option value="{{$item->name}}" selected="selected">{{$item->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </th>
            </tr>
        </thead>
                        
        @foreach ($universities as $item)

            <tr>
                <td>
                    {{$item->name}}
                </td>
                <td>
                    {{$item->description}}
                </td>
                <td>
                    {{$item->orgname}}
                </td>
                <td>
                    {{$item->countryname}}
                </td>
                </tr>
                    @endforeach 
                </table>

                <script type="text/javascript">
                $(document).ready(function() {
                    $('#organizationChoice').multiselect({buttonWidth: '150px'});
                    $('#countryChoice').multiselect({buttonWidth: '150px'});
                    
                });
                </script>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
        </main>
    </div>
</body>
</html>