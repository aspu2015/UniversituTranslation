@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Редактирование новости:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <form action="/news/{{$currentNews->id}}/update" method="POST">
                        @csrf
                        <div class="form-group">
                                <label for="title">Заголовок новости:</label>
                                <input type="text" class="form-control" id="title" name="title" aria-describedby="descriptionHelp" placeholder="Введите заголовок новости" value="{{$currentNews->title}}" >
                        </div>  
                        <div class="form-group">
                                <label for="isPublished">Опубликовано:</label><br>
                                    @php
                                    {{ $check = ''; 
                                        $check1 = '';
                                        if ($currentNews->published == 1){
                                        $check = 'checked';
                                        $check2 = '';
                                    } else if ($currentNews->published == 2)
                                        {
                                            $check = ''; $check2 = 'checked';
                                        }
                                    }}
                                    @endphp
                                Да - <input type="radio"  {{$check}} value="1" class="form-control" name="isPublished" aria-describedby="descriptionHelp">
                                Нет - <input type="radio" {{$check2}} value="2" class="form-control" name="isPublished" aria-describedby="descriptionHelp">
                        </div>
                        <input type="submit" value="Обновить">
                    </form>
                    
                    <hr>
                    Доступные переводы:
                    <br>
                        <button class="button" onclick="location.href = '/news/{{$currentNews->id}}/translation/create';" >добавить перевод</button>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Язык</th>
                                <th scope="col">Заголовок</th>
                                <th scope="col">Текст</th>
                                <th scope="col">Редактировать</th>
                                <th scope="col">Удалить</th>
                            </tr>
                        </thead>
                        @foreach ($translations as $item)
                        <tr>
                            <td>
                                {{$item->langName}}
                            </td>
                            <td>
                                {{$item->news_title}}
                            </td>
                            <td style="width: 40%;">
                                {{ $item->news_text }}
                            </td>
                            <td>
                                <a href="/newsTranslation/{{$item->id}}/edit">редактировать</a>
                            </td>
                            <td>
                                <form action="/newsTranslation/{{$item->id}}/destroy" method="POST">
                                    @csrf
                                    <input type="submit" value = "удалить">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <hr>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
