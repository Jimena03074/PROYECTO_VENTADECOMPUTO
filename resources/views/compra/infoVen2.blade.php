<html>
<body>
<div >
  <table  border = 3 id="tablavendedor">
    <tr>
      <td colspan = 6 id="tres">VENTAS</td>
    </tr>

    <tr id="cuatro"> 
        <td>Clave</td>
        <td>Fecha</td>
        <td>ID cliente</td>
        <td>Nombre cliente</td> 
        <td >Id Vendedor</td>
        <td >Nombre Vendedor</td>

    </tr>

    @foreach($consulta as $c)
    <tr>
      <td>{{$c->idve}}</td> <!--id de la venta-->
      <td>{{$c->fecha}}</td> <!--fecha de la venta-->
      <td>{{$c->cliente}}</td> 
      <td>{{$c->nombre}}</td> 
      <td>{{$c->vendedor}}</td>
      <td>{{$c->nombrev}}</td> 
      
    </tr>
    @endforeach

  </table>
  <br>
</div>
</body>
</html>
