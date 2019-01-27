@extends('layouts.default')
 @section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Izmjeni stavke cjenika</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cjenik.index') }}"> Nazad </a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ups!</strong> Problem s unosom.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($cjenik, ['method' => 'PATCH','route' => ['cjenik.update', $cjenik->id]]) !!}
    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {!! Form::text('Naziv_stavke_cjenika', null, array('placeholder' => 'Unesi naziv stavk cjenika','class' => 'form-control')) !!}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cijena:</strong>
                {!! Form::textarea('Cijena', null, array('placeholder' => 'Unesi cjenu u kunama','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Opis:</strong>
                {!! Form::textarea('Opis', null, array('placeholder' => 'Unesi opis','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Potvrdi</button>
        </div>


    </div>
    {!! Form::close() !!}


@endsection
 choose Tools | Templat