@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Переводы:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <form action="/" method="POST" onsubmit="return postForm()">
                        @csrf
                        <div class="form-group">
                            <label for="language">Название языка:</label>
                            
                        </div>
                        <div class="form-group">
                                <label for="universityName">Название университета:</label>
                                <input type="text" class="form-control" id="universityName" name="universityName" aria-describedby="descriptionHelp" placeholder="Введите название университета " >
                                
                        </div>
                        <div class="form-group">
                                <label for="universityDescription">Описание Университета:</label>
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
