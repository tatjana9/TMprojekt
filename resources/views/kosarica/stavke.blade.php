@extends('kosarica.layout')
 
@section('title', 'Products')
 
@section('content')

 
    <div class="container products">
 
        <div class="row">
 
            @foreach($cjeniks as $cjenik)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                    
                        <div class="caption">
                            <h4>{{ $cjenik->Naziv_stavke_cjenika }}</h4>
                             <p>{{ str_limit(strtolower($cjenik->Opis), 50) }}</p>
                            <p><strong>Cijena: </strong> {{ $cjenik->Cijena }}Kn</p>
                            <p class="btn-holder"><a href="{{ url('dodajukosaricu/'.$cjenik->id) }}" class="btn btn-warning btn-block text-center" role="button">Dodaj u kosaricu</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
 
        </div><!-- End row -->
 
    </div>
 
@endsection