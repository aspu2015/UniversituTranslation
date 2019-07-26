@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Страны:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    <button class="button" onclick="location.href = '/country/create';" >добавить страну</button>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Название</th>
                                <th scope="col">Редактировать</th>
                                <th scope="col">Удалить</th>
                            </tr>
                        </thead>
                        @foreach ($countries as $item)
                            <tr>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                <a href="/country/{{$item->id}}/edit">редактировать</a>
                                </td>
                                <td>
                                    <form action="/country/{{$item->id}}/destroy" method="POST">
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
