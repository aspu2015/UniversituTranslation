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

                    
                    <form action="/news/{{$news_id}}/translation/store" method="POST" onsubmit="return postForm()">
                        @csrf
                        <div class="form-group">
                            <label for="language">Язык:</label>
                            <select class="form-control" id="language" name="language_id">
                                @foreach ($langs as $item)
                                    <option value="{{$item->id}}">{{$item->langName}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                                <label for="newsName">Заголовок:</label>
                                <input type="text" class="form-control" id="newsName" name="newsName" aria-describedby="descriptionHelp" placeholder="Введите заголовок новости " >
                                
                        </div>

                        <div class="form-group">
                                <label for="universityDescription">Текст новости:</label>
                                <textarea name="universityDescription" id="universityDescription" ></textarea>
                                
                        </div>  
                        <input type="submit" value="Создать">
                    </form>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/js/summernote/init.js')}}" defer></script>

@endsection
