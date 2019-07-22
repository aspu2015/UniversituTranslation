@extends('layouts.adminLayout')
<style>
    .card-body a {
        font-size: 20px;
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
                
                    <a class="links" href="{{ url('/info_translation/1/edit') }}">
                    ИнфоБлок1
                    </a>


                    <br>
                    <a class="links" href="{{ url('/info_translation/2/edit') }}">
                    ИнфоБлок2
                    </a>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection