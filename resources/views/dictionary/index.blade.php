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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Язык</th>
                                <th scope="col">Редактировать словарь</th>
                            </tr>
                        </thead>
                        @foreach ($dictionary as $item)
                            <tr>
                                <td>
                                    {{$item->langName}}
                                </td>
                                <td style="width: 50%;">
                                <a href="/dictionary/{{$item->id}}/edit">редактировать</a>
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
