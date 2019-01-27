@extends('layouts.default')
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <h2>Cjenik</h2>
            </div>
            <div class="pull-right">
                <br>
                <a class="btn btn-success" href="{{ route('cjenik.create') }}"> Kreiraj novu stavku</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>Redni broj</th>
            <th>Naziv stavke cjenika</th>
            <th>Cijena</th>
             <th>Opis</th>
            <th width="280px">Akcija</th>
        </tr>
    @foreach ($cjeniks as $key => $cjenik)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $cjenik->Naziv_stavke_cjenika }}</td>
         <td>{{ $cjenik->Cijena }}</td>
          <td>{{ $cjenik->Opis }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('cjenik.show',$cjenik->id) }}">Prikaz</a>
            <a class="btn btn-primary" href="{{ route('cjenik.edit',$cjenik->id) }}">Izmjena</a>
            {!! Form::open(['method' => 'DELETE','route' => ['cjenik.destroy', $cjenik->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Obrisi', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $cjeniks->render() !!}


@endsection