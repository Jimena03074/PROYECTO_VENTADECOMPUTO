@foreach($productos as $p)
<option value = '{{$p->idp}}'>{{$p->nombre}}</option>
@endforeach
