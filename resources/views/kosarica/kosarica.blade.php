@extends('kosarica.layout')
 
@section('title', 'Kosarica')
 
@section('content')
 
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Naziv</th>
            <th style="width:10%">Cijena</th>
            <th style="width:8%">Kolicina</th>
            <th style="width:22%" class="text-center">Ukupno</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
 
        <?php $total = 0 ?>
 
        @if(session('kosarica'))
            @foreach(session('kosarica') as $id => $details)
 
                <?php $total += $details['cijena'] * $details['kolicina'] ?>
 
                <tr>
                    <td data-th="Naziv">
                        <div class="row">
                        
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['naziv_stavke_cjenika'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Cijena">Kn{{ $details['cijena'] }}</td>
                    <td data-th="Kolicina">
                        <input type="number" value="{{ $details['kolicina'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Ukupno" class="text-center">Kn{{ $details['cijena'] * $details['kolicina'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
 
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total {{ $total }}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('stavke') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-right"></i> Nastavi narudzbu</a></td>
            
            <td class="hidden-xs text-center"><strong>Ukupno: Kn {{ $total }}</strong></td>
        </tr>
        </tfoot>
        @section('scripts')
    <script type="text/javascript">
 
        $(".update-cart").click(function (e) {
           e.preventDefault();
 
           var ele = $(this);
 
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".kolicina").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
 
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
            if(confirm("Obrisati stavku?")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
 
    </script>
 
@endsection
    </table>
 
@endsection