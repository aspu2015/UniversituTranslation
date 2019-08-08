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
                    
                    <form action="/dictionary/{{$word[0]->id}}/word/update" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Значение:</label>
                            <span style="font-weight: bold;">{{$word[0]->value}}</span>
                        </div>

                        <div class="form-group">
                                <label for="translation">Перевод:</label>
                                <input type="text" class="form-control" id="translation" name="translation" aria-describedby="descriptionHelp" placeholder="Перевод" value="{{$word[0]->text}}">
                                
                        </div>
                        
                        <input type="submit" value="Обновить">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection