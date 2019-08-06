@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Языки:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="/lang/{{$lang->id}}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="langName">Отображаемое название языка:</label>
                            <input type="text" class="form-control" id="langName" name="langName" aria-describedby="descriptionHelp" placeholder="Введите название языка " value="{{$lang->langName}}" >    
                        </div>
                        <div class="form-group">
                                <label for="langName">Приоритет:<br>Языки с приоритетом 
                                    1 будут отображаться на главной странице в строку<br>
                                    С приоритетом 2 - в выпадающем списке</label><br>
                                    @php
                                    {{ $check = ''; 
                                        $check1 = '';
                                        if ($lang->priority == "1"){
                                        $check = 'checked';
                                        $check2 = '';
                                    } else if ($lang->priority == "2")
                                        {
                                            $check = ''; $check2 = 'checked';
                                        }
                                    }}
                                    @endphp
                                1 - <input type="radio"  {{$check}} value="1" class="form-control" id="langPriority" name="langPriority" aria-describedby="descriptionHelp">
                                2 - <input type="radio" {{$check2}} value="2" class="form-control" id="langPriority" name="langPriority" aria-describedby="descriptionHelp">
                        </div>
                        <div class="form-group">
                            <label for="langName">Файл для картинки:</label>
                            <input type="file" class="form-control" id="file" name="file" aria-describedby="descriptionHelp" placeholder="Выберите файл " >
                        </div>
                        <input type="submit" value="Обновить">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
