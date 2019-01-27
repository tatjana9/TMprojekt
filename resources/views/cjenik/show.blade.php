@extends('layouts.default')
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left"><br>
                <h2> Stavke cjenika</h2>
            </div>
            <div class="pull-right"><br>
                <a class="btn btn-primary" href="{{ route('cjenik.index') }}"> Nazad</a>
            </div>
        </div>
    </div>


    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Naziv stavke cjenika:</strong>
                {{ $cjenik->Naziv_stavke_cjenika }}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cijena:</strong>
                {{ $cjenik->Cijena }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Opis:</strong>
                {{ $cjenik->Opis }}
            </div>
        </div>


    </div>


@endsection