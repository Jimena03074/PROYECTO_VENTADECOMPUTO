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
            <input type='text' id= 'idve' name='idve' value = '{{$siguiente}}' readonly>
        
			<font id="uno">-----</font>  
            <font>Fecha venta </font> <font id="uno">-</font>  <input type='date' id= 'fecha' name='fecha'>
            
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
			<input type = 'button' value ='agregar' id='agregar'>
        <br>
</form>
    
    <div id = 'lista'>
	</div>
    <br>
    <br>
</body>
</html>

@stop

@section('css')
    
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop