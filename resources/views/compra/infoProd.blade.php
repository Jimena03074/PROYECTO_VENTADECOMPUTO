

<div style="margin-left: 200px;">
    <img src = "{{asset('archivos/productos/'.$consulta->ruta)}}" height =190 width=190>  <!---height= alto   -->
</div>


@if($consulta->idt=='1')
     <font id="uno">---------------------------------</font><font>TIPO</font> 
     <input type= 'radio' name = 'activo' id='activo1' value = 'Nuevo' checked><font>Nuevo </font>
     <input type= 'radio' name = 'activo' id='activo1' value = 'Seminuevo' disabled><font>Seminuevo</font>
     <input type= 'radio' name = 'activo' id='activo1' value = 'Reacondicionado' disabled><font>Reacondicionado </font> 
@endif

@if($consulta->idt=='2')
     <font id="uno">---------------------------------</font><font>TIPO</font> 
     <input type= 'radio' name = 'activo' id='activo1' value = 'Nuevo' ><font>Nuevo </font> 
     <input type= 'radio' name = 'activo' id='activo1' value = 'Seminuevo' checked><font>Seminuevo</font>
     <input type= 'radio' name = 'activo' id='activo1' value = 'Reacondicionado'><font>Reacondicionado </font> 
@endif

@if($consulta->idt=='3')
     <font id="uno">---------------------------------</font><font>TIPO</font> 
     <input type= 'radio' name = 'activo' id='activo1' value = 'Nuevo' ><font>Nuevo </font> 
     <input type= 'radio' name = 'activo' id='activo1' value = 'Seminuevo'><font>Seminuevo</font> 
     <input type= 'radio' name = 'activo' id='activo1' value = 'Reacondicionado'checked> <font>Reacondicionado </font> 
@endif

<br>
<font id="uno">---------------------------------</font> <font>Disponible </font><font id="uno">---</font> <input type='text' name ='cantidad' id='cantidad' value = '{{$consulta->cantidad}}' readonly>
<br>
<font id="uno">---------------------------------</font> <font>Costo </font> <font id="uno">----------</font> <input type='text' name ='costo' id='costo' value = '{{$consulta->costo}}' readonly>
<br>
<br>

@if($consulta->idt=='1')
<font>Seleccione la Promocion</font><font id="uno">-</font> <select name= 'pro' id= 'pro'>
                                <option value ='0'>sin descuento </option>
                                <option value ='10'>10% </option>
                                <option value ='30'>30% </option>
                                <option value ='50'>50%</option>
                        </select>
@endif

@if($consulta->idt=='2')
<font>Seleccione la Promocion</font><font id="uno">-</font> <select name= 'pro' id= 'pro'>
                                <option value ='0'>sin descuento </option> 
                                <option value ='10'disabled>10% </option>
                                <option value ='30'disabled>30% </option>
                                <option value ='50'disabled>50%</option>
                        </select>
@endif

@if($consulta->idt=='3')
<font>Seleccione la Promocion</font><font id="uno">-</font> <select name= 'pro' id= 'pro'>
                                5<option value ='0'>sin descuento </option>
                                <option value ='10'disabled>10% </option>
                                <option value ='30'disabled>30% </option>
                                <option value ='50'disabled>50%</option>
                        </select>
@endif