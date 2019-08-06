@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Словарь:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                        <button class="button" onclick="location.href = '/dictionary/{{$currentLagnuage}}/translation/create';" >добавить перевод</button>
                    <br>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">tag_id</th>
                                <th scope="col">Значение поля</th>
                                <th scope="col">Перевод</th>
                                <th scope="col">Редактировать</th>
                            </tr>
                        </thead>
                        @foreach ($words as $item)
                            <tr>
                                <td>
                                    {{$item->tagName}}
                                </td>
                                <td>
                                    {{$item->value}}
                                </td>
                                <td>
                                    {{$item->text}}
                                </td>
                                <td style="width: 20%;">
                                <a href="/dictionary/{{$item->langId}}/word/edit">редактировать</a>
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