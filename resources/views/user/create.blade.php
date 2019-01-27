@extends('layouts.default')
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Dodaj novog admina</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('user.index') }}"> Natrag</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Greška!</strong> Problem sa unosom.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::open(array('route' => 'user.store','method'=>'POST')) !!}
    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ime:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Ime','class' => 'form-control')) !!}
            </div>
        </div>


          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lozinka:</strong>
                {!! Form::password('password', null, array('placeholder' => 'Lozinka','class' => 'form-control')) !!}
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Prihvati</button>
        </div>


    </div>
    {!! Form::close() !!}


@endsection