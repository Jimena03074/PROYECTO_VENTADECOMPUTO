@extends('adminlte::page')

@section('title', 'Modulo')

@section('content_header')
   
@stop

@section('content')
  
<html >
<head>
   
    <!--<link rel="stylesheet"  href="{{asset('css/bootstrap.css')}}" >-->
    <!--<link rel="stylesheet"  href="{{asset('css/bootstrap.min.css')}}" -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    
	<script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
</head>
<body>
    <script type="text/javascript">
        $(document).ready(function(){
        // funcion para que los productos elegidos se agreguen a la lista
        
         //funcion para traer datos al combo box de productos
        
        //funcion para traer datos al combo box de productos
        $("#idc").click(function() {
            $("#idp").load('{{url('comboprod')}}' + '?idc=' +this.options[this.selectedIndex].value);
        });
        
        //funcion para traer la informacion extra de los productos 
        $("#idp").click(function() {
            $("#infoproducto").load('{{url('infoprod')}}' + '?idp='  +this.options[this.selectedIndex].value) ;
        });

        
        $("#idv").click(function() {
            $("#infovendedor").load('{{url('infoven')}}' + '?idv='  +this.options[this.selectedIndex].value);
        });

       
        
        //funcion para traer la informacion extra de los productos 
        $("#idcli").click(function() {
            $("#infocliente").load('{{url('infocli')}}' + '?idcli='  +this.options[this.selectedIndex].value) ;
        });

        //Funcion para que calcule el descuento de los productos 
        $("#canti").keyup(function() {
			var costo, can,tot1,tot,tot2,cantidad,decuento;
			costo= parseInt($("#costo").val());
			can = parseInt($("#canti").val());//se refiere a cantidad que quiere
			cantidad = parseInt($("#cantidad").val());// se refiere  cantidad en existencia
            descuento = ($("#pro").val());
			if (can<=cantidad){
				tot1 = (costo *can);
                
                if(descuento == 0){
                    tot = tot1
                    $("#total").val(tot);
                }
                
                if(descuento == 10){
                    tot2 = (tot1*.10)
                    tot = (tot1-tot2)
                    $("#total").val(tot);
                }
                if(descuento == 30){
                    tot2 = (tot1*.30)
                    tot = (tot1-tot2)
                    $("#total").val(tot);
                }
                if(descuento == 50){
                    tot2 = (tot1*.50)
                    tot = (tot1-tot2)
                    $("#total").val(tot);
                }           
			}
			else
            {
				alert('LA CANTIDAD QUE INGRESASTE SUPERA A LA CANTIDAD EN INVENTARIO');
				$("#canti").val(0);
				$("#total").val(0);
			}
		});
        

        $("#idv").click(function() {
            $("#grupo").load('{{url('infoven2')}}' + '?idv=' +this.options[this.selectedIndex].value);
        });

        // funcion para que los productos elegidos se agreguen a la lista 
        $("#agregar").click(function() {
		    $("#lista").load('{{url('agregalista')}}' + '?' + $(this).closest('form').serialize()) ;
	    });
        
    });
    </script>

<form>
            <br>
            <font> No. de venta </font><font id="uno">-</font>  
            <input type='text' id= 'idve' name='idve' value = '{{$ventas->idve}}' readonly>
        
			<font id="uno">-----</font>  
            <font>Fecha venta </font> <font id="uno">-</font>  
            <input type='date' id= 'fecha' name='fecha' value='{{$ventas->fecha}}'>
            
        <br>
            <font>Vendedor</font><font id="uno">-----</font>  
			<select name ='idv' id='idv'>
				@foreach($vendedores as $ven)
					<option value= '{{$ven->idv}}'>{{$ven->nombreV}}</option>
				@endforeach
        	</select>
        <br>
            <div id='infovendedor'>	
			</div>
            <div id = 'grupo'>
	        </div>  
        <br>
            <font>Cliente</font><font id="uno">--------</font>  
            <select name ='idcli' id='idcli'>
                @foreach($clientes as $cli)
                    <option value= '{{$cli->idcli}}'>{{$cli->nombre}}</option>
                @endforeach
            </select>
        <br>
            <div id='infocliente'>	
			</div>
        <br>
        <!--<h1 style="background-color:powderblue;">-----------PRODUCTOS-------------</h1>-->
            
            <font> Categoría</font> <font id="uno">----</font>  
			<select name ='idc' id='idc'>
				@foreach($categorias as $cat)
					<option value= '{{$cat->idc}}'>{{$cat->nombreC}}</option>
				@endforeach
        	</select>

        <br>
            <font> Producto</font> <font id="uno">--- -</font>  
            <select name ='idp' id='idp'> 
            </select>
		
            <div id='infoproducto'>	
			</div>
        
            <font> Cantidad a comprar</font><font id="uno">-------</font> <input type='text' name = 'canti' id='canti'>
		<br>
			<font> Total</font><font id="uno">---------------------------</font>   <input type='text' name = 'total' id= 'total' readonly>
        <br>
			<input type = 'button' value ='agregar' id='agregar' >
        <br>
</form>
    
    <div id = 'lista'>
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

	</div>
    <br>
    <br>
</body>
</html>

@stop

