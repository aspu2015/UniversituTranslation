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
                    
                    <form action="/locality/store" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Значение:</label>
                            <select name="word_id" class="form-control">
                            @foreach ($dictionary as $item)   
                                <option value="{{$item->id}}"> {{$item->value}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                                <label for="name">Перевод:</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="descriptionHelp" placeholder="Перевод" >
                                
                        </div>
                        
                        <input type="submit" value="Создать">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection