@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Населенные пункты:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="/locality/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                                <label for="name">Отображаемый населенный пункт:</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="descriptionHelp" placeholder="Введите название населенного пункта" >
                                
                        </div>
                        <div class="form-group">
                            <select name="country_id" class="form-control">
                            @foreach ($country as $item)   
                                <option value="{{$item->id}}"> {{$item->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <input type="submit" value="Создать">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection