@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Перевод новости:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <form action="/newsTranslation/{{$translation->id}}/update" method="POST" onsubmit="return postForm()">
                        @csrf
                        <div class="form-group">
                            <label for="language">Язык:</label>
                            <select class="form-control" id="language" name="language_id">
                                
                            <option selected value="{{$selectedLang[0]->id}}">{{$selectedLang[0]->langName}}</option>
                                @foreach ($avalibleLangs as $item)
                                    <option value="{{$item->id}}">{{$item->langName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                                <label for="translationTitle">Заголовок:</label>
                                <input type="text" class="form-control" id="translationTitle" name="translationTitle" aria-describedby="descriptionHelp" placeholder="Введите заголовок новости " value="{{$translation->news_title}}">
                        </div>
                        
                        <div class="form-group">
                                <label for="universityDescription">Текст новости:</label><br>
                                <textarea name="universityDescription" id="universityDescription" >{{$translation->news_text}}</textarea>
                        </div>
                        <hr>
                        <input type="submit" value="Обновить">
                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/js/summernote/init.js')}}" defer></script>
@endsection
