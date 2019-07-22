@extends('layouts.adminLayout')
<style>
    .card-body a {
        font-size: 24px;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Разделы:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
       
                    </form>
                    <hr>
                
                    <a class="links" href="{{ url('/info_translation/1/view') }}">
                    Главная
                    </a>

                    <br>
                    <!-- <a class="links" href="{{ url('/info_translation/2/view') }}">
                    Список университетов
                    </a> -->


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
