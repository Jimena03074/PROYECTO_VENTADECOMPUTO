
<br>
<table border = 5 id="tablaCarrito">
    <tr id="seis"> 
      <td>Categoria</td> 
      <td>Producto</td> 
      <td>Cantidad</td> 
      <td>Costo</td> 
      <td>Descuento</td> 
      <td>Subtotal</td> 
      <td>Acciones</td>
    </tr>


    @foreach($productosventa as $pv)
    <tr>
      <td>{{$pv->nombreC}}</td>
      <td>{{$pv->nombre}}</td>
      <td>{{$pv->cantidad}}</td>
      <td>{{$pv->precio}}</td>
      <td>{{$pv->promocion}}</td>
      <td>{{$pv->subtotal}}</td>
      <td>
          <form action='' method = 'POST' enctype='application/x-www-form-urlencoded'
            name='frmdo{{$pv->idvd}}' id='frmdo{{$pv->idvd}}' target='_self'>
            <input type = 'hidden' value = '{{$pv->idvd}}' name = 'idvd' id= 'idvd'>
            <input type = 'hidden' value = '{{$pv->cantidad}}' name = 'canti' id= 'canti'>
            <input type = 'hidden' value = '{{$pv->promocion}}' name = 'promo' id= 'promo'>
            <input type = 'hidden' value = '{{$pv->idve}}' name = 'idve' id= 'idve'>
            <input type = 'hidden' value = '{{$pv->idp}}' name = 'idp' id= 'idp'>
            <input type = 'hidden' value = '{{$pv->nombreC}}' name = 'nombreC' id= 'idc'>
            <input type='button' name='quitar' class='quitar' value='quitar' id='quitar' />
          </form>
        </td>
    </tr>
    @endforeach


    <tr id="ocho">
      <td colspan = 5 >Total</td>
      <td colspan = 2 >{{$totalventa->total}}</td>
      


    </tr>
</table>
<br>
<br>

<!--funcion para quitar elemento de la lista-->
<script type="text/javascript">
$(function () {
  $('.quitar').click(
    function () {
      formulario = this.form;
            $("#lista").load('{{url('quitalista')}}' + '?' + $(this).closest('form').serialize()) ;
    }
  );
});
</script>
