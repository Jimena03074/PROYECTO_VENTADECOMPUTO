@extends('adminlte::page')


@section('css')
      <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> 
      <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css">
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
  @endsection
  

@section('content')
  <div  id="holaR"  style="background: #8e8ca3" >
    <div class="card-body">
      <br> 
      
      <table  id="comprasR" class="table table-dark table-striped table-bordered table-responsive " style="width:90%" >
        <thead class="btn-teal nav-bg text-black">
          <tr >
          <th scope="col">Clave</th>
          <th scope="col">Clave Venta</th>
          <th scope="col">Fecha</th>
          <th scope="col">Vendedor</th>
          <th scope="col">Cliente</th>
          <th scope="col">Producto</th>
          <th scope="col">Precio</th>
          <th scope="col">Descuento</th>
          <th scope="col">Total</th>
          <td>Acciones</td>
        </thead>

        <tbody>
          @foreach($consulta as $c)
          <tr class="table-active">
            <td>{{$c->idvd}}</td> <!--id de la venta-->
            <td>{{$c->idve}}</td> <!--id de la venta-->
            <td>{{$c->fecha}}</td> <!--fecha de la venta-->
            <td>{{$c->nombreV}}</td> <!--nombre de vendedor-->
            <td>{{$c->cliente}}</td> <!--nombre de cliente-->
            <td>{{$c->nombre}}</td> <!--nombre de cliente-->
            <td>{{$c->costo}}</td> <!--nombre de cliente-->
            <td>{{$c->promocion}}</td> <!--nombre de cliente-->
            <td>{{$c->totalventa}}</td> <!--total de la venta-->
           <td>
                
                <a href="{{ route('eliminarVenta', ['idvd' => $c->idvd]) }}">
                  <input type='button' name='eliminar' class='eliminar' value='eliminar' id='eliminar' />
                </a>
                
                <a href="{{ route('editarVenta', ['idve' => $c->idve]) }}">
                  <input type='button' name='editar' class='editar' value='editar' id='editar' />
                </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      
      </table>
      <br>
    </div>
  </div>
@stop


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
    
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#comprasR thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#comprasR thead');
        
            var table = $('#comprasR').DataTable({
                orderCellsTop: true,
                fixedHeader: true,
                initComplete: function () {
                    var api = this.api();
        
                    // For each column
                    api
                        .columns()
                        .eq(0)
                        .each(function (colIdx) {
                            // Set the header cell to contain the input element
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();
                            $(cell).html('<input type="text" placeholder="' + title + '" />');
        
                            // On every keypress in this input
                            $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                                .off('keyup change')
                                .on('change', function (e) {
                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr = '({search})'; //$(this).parents('th').find('select').val();
        
                                    var cursorPosition = this.selectionStart;
                                    // Search the column for that value
                                    api
                                        .column(colIdx)
                                        .search(
                                            this.value != ''
                                                ? regexr.replace('{search}', '(((' + this.value + ')))')
                                                : '',
                                            this.value != '',
                                            this.value == ''
                                        )
                                        .draw();
                                })
                                .on('keyup', function (e) {
                                    e.stopPropagation();
        
                                    $(this).trigger('change');
                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
            });
        });
    </script>

@endsection



 
 

