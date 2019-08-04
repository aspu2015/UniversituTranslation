@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Типы организаций:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="/locality/{{$locality->id}}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="OrganizationName">Отображаемый населенный пункт:</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="descriptionHelp" placeholder="Введите название населенного пункта " value="{{$locality->name}}" >    
                        </div>
                        <div class="form-group">
                            <select name="country_id" class="form-control">
                            <option value="{{$currentCountry->id}}" selected>{{$currentCountry->name}} </option>
                            @foreach ($country as $item)   
                                <option value="{{$item->id}}"> {{$item->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <input type="submit" value="Обновить">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection