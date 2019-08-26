@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Новости:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    <button class="button" onclick="location.href = '/news/create';" >
                        добавить новость
                    </button>
                    <br>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Заголовок новости</th>
                                <th scope="col">Дата публикации</th>
                                <th scope="col">Опубликовано</th>
                                <th scope="col">Редактировать</th>
                                <th scope="col">Удалить</th>
                            </tr>
                        </thead>
                        @foreach ($news as $item)
                            <tr>
                                <td>
                                    {{$item->title}}
                                </td>
                                <td>
                                    {{$item->publicDate}}
                                </td>
                                <td>
                                    @php
                                        $isPublished = '';
                                        if ($item->published == 1) $isPublished = 'Да';
                                        else $isPublished = 'Нет';
                                    @endphp
                                    {{$isPublished}}
                                </td>
                                <td>
                                <a href="/news/{{$item->id}}/edit">редактировать</a>
                                </td>
                                <td>
                                    <form action="/news/{{$item->id}}/destroy" method="POST">
                                        @csrf
                                        <input type="submit" value = "удалить">
                                    </form>
                                </td>
                            </tr>
                        @endforeach 
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
