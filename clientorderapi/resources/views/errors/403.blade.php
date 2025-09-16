@extends('templates.base')
@section('title', 'Error 403')
@section('header', 'Error 403')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row aling-item-center m-b20">
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('img/denied.png') }}" alt="403"
                    class="img-fluid" style="width: 50%; height:auto;">
                </div>
                <div class="col-lg-6 text-center">
                    <h1 class="display-1">403</h1>
                    <h2>Accesso no autorizado</h2>
                    <a href="Javascript:hystory.back()">
                        <h4 class="text-success">Volver</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
