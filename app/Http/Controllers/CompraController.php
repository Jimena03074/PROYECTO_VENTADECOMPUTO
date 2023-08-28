<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\categorias;
use App\Models\productos;
use App\Models\tipos;
use App\Models\vendedores;
use App\Models\ventas;
use App\Models\ventadetalles;
use App\Models\clientes;

class CompraController extends Controller
{
    //funcion de inicio 
    public function compra()
    {   

      $ventas = ventas::orderby('idve','desc')->get();
      $cuantos = count($ventas);

      if($cuantos>=1)
      {
      $siguiente = $ventas[0]->idve +1;
      }
      else {
      $siguiente= 1;
      }

      $vendedores =vendedores::all();
      $categorias =categorias::all();
      $clientes =clientes::all();
      return view ('Compra.carrito') 
      ->with('categorias',$categorias)
      ->with('vendedores',$vendedores)
      ->with('clientes',$clientes)
      ->with('siguiente',$siguiente);

    }
   
    //Funcion para el combo de productos
    public function combo_producto(Request $request)
    {
     $productos = productos::where('idc','=',$request->idc)
                             ->get();
      return view ('Compra.comboPro')
      ->with('productos',$productos);
    }

    //funcion para la informacion de producto seleccionado 
    public function informacion_producto(Request $request)
    {
      $consulta = productos::where('idp','=',$request->idp)->get();
    //return $consulta;
    return view('Compra.infoProd')->with('consulta',$consulta[0]);
    }

    
    //-----------
    //funcion para la informacion de producto seleccionado 
    public function informacion_vendedor(Request $request)
    {
      $consulta = vendedores::where('idv','=',$request->idv)->get();
      return view('Compra.infoVen')->with('consulta',$consulta[0]);
    }

    //funcion para la informacion de producto seleccionado 
    public function informacion_vendedor2(Request $request)
    {

        //$consulta = ventas::where('vendedor','=',$request->idv)->get();

        //return view('Compra.infoVen2')
        //>with('consulta',$consulta);
        $consulta = \DB::select("SELECT v.idve,v.fecha,v.cliente,cli.nombre,v.vendedor,ven.nombrev
        FROM ventas AS v
        INNER JOIN vendedores AS ven ON ven.idv =v.vendedor
        INNER JOIN clientes AS cli ON cli.idcli =v.cliente
        WHERE v.vendedor = $request->idv");

        return view('Compra.infoVen2')
        ->with('consulta',$consulta);
    }


    //funcion para la informacion de producto seleccionado 
    public function informacion_cliente(Request $request)
    {
      $consulta = clientes::where('idcli','=',$request->idcli)->get();
    //return $consulta;
      return view('Compra.infoCli')->with('consulta',$consulta[0]);
    }

    // funcio para agregar articulos a la lista
     public function agrega_lista(Request $request)
     {
          $consulta = ventas::where('idve',$request->idve)->get();
          $cuantos = count($consulta);
      
          //crear nueva venta
          if($cuantos==0)
          {
            $ventas = new ventas;
            $ventas->idve = $request->idve;//venta
            $ventas->fecha = $request->fecha;
            $ventas->cliente = $request->idcli;
            $ventas->vendedor = $request->idv;
            
            $ventas->save();
          }

          $ventadetalles = new ventadetalles;
          $ventadetalles->idve = $request->idve;
          $ventadetalles->idv = $request->idv;
          $ventadetalles->idcli = $request->idcli; 
          $ventadetalles->idp = $request->idp;
          $ventadetalles->cantidad = $request->canti;
          $ventadetalles->precio= $request->costo;
          $ventadetalles->costo = $request->total;
          $ventadetalles->promocion = $request->pro;
          $ventadetalles->save();

          $productosventa=\DB::select("SELECT vd.idp,vd.cantidad,vd.costo,vd.precio,vd.promocion,p.nombre,ca.nombreC,
          vd.cantidad * vd.costo AS subtotal, vd.idvd,vd.idve
          FROM ventadetalles AS vd
          INNER JOIN productos AS p ON p.idp =vd.idp
          INNER JOIN categorias AS ca ON p.idc =ca.idc
          WHERE vd.idve = $request->idve");

          $totalventa = \DB::select("
          select sum(vd.cantidad * vd.costo) as total
          from ventadetalles as vd where vd.idve = $request->idve");

          $productos = productos::find($request->idp);
          $productos->cantidad =$request->cantidad - $request->canti;
          $productos->save();

        
          return view('compra.tablaproductos')
          ->with('productosventa',$productosventa)
          ->with('totalventa',$totalventa[0]);
          
      }

      //quita articulo de carrito
      public function quita_lista (Request $request)
      {
        $eliminaregistro = \DB::delete("delete from ventadetalles WHERE
        idvd = $request->idvd");
  
        $productosventa=\DB::select("SELECT vd.idp,vd.cantidad,vd.costo,vd.precio,vd.promocion,p.nombre,ca.nombreC,
        vd.cantidad * vd.costo AS subtotal, vd.idvd,vd.idve
        FROM ventadetalles AS vd
        INNER JOIN productos AS p ON p.idp =vd.idp
        INNER JOIN categorias AS ca ON p.idc =ca.idc
        WHERE vd.idve = $request->idve");
  
        $totalventa = \DB::select("
        select sum(vd.cantidad * vd.costo) as total
        from ventadetalles as vd where vd.idve = $request->idve");
  
        return view('compra.tablaproductos')
        ->with('productosventa',$productosventa)
        ->with('totalventa',$totalventa[0]);
      }

      //--------------------------------- FUNCIONES DE REPORTE DE VENTAS---------------------------

      //Funcion de la tabla de reporte ventas
      public function reporteVentas()
      {
        $consulta = \DB::select("SELECT vd.idvd,v.idve,v.fecha,ven.nombreV,v.cliente,pro.nombre,pro.costo,vd.promocion,
        SUM(vd.cantidad * vd.costo) AS totalventa
        FROM ventas AS v
        INNER JOIN ventadetalles AS vd ON v.idve = vd.idve
        INNER JOIN vendedores AS ven ON ven.idv = vd.idv
        INNER JOIN productos AS pro ON pro.idp = vd.idp
        GROUP BY vd.idvd,v.idve,v.fecha,ven.nombreV,v.cliente,pro.nombre,pro.costo,vd.promocion
        ORDER BY v.idve  ASC");
        return view ('compra.reporteVentas')
        ->with('consulta',$consulta);
      }




    public function eliminarVenta(Request $request)
      {
        $productosventa=\DB::delete("DELETE from ventadetalles
        WHERE idvd = $request->idvd");

        $consulta = \DB::select("SELECT vd.idvd,v.idve,v.fecha,ven.nombreV,v.cliente,pro.nombre,pro.costo,vd.promocion,
        SUM(vd.cantidad * vd.costo) AS totalventa
        FROM ventas AS v
        INNER JOIN ventadetalles AS vd ON v.idve = vd.idve
        INNER JOIN vendedores AS ven ON ven.idv = vd.idv
        INNER JOIN productos AS pro ON pro.idp = vd.idp
        GROUP BY vd.idvd,v.idve,v.fecha,ven.nombreV,v.cliente,pro.nombre,pro.costo,vd.promocion
        ORDER BY v.idve  ASC");
        return view ('compra.reporteVentas')
        ->with('consulta',$consulta);
    }


    //funcion de 
    public function editarVenta(Request $request)
    {
      $ventas = ventadetalles::where('idve','=',$request->idve)->get();

      $productosventa=\DB::select("SELECT vd.idp,vd.cantidad,vd.costo,vd.precio,vd.promocion,p.nombre,ca.nombreC,
      vd.cantidad * vd.costo AS subtotal, vd.idvd,vd.idve
      FROM ventadetalles AS vd
      INNER JOIN productos AS p ON p.idp =vd.idp
      INNER JOIN categorias AS ca ON p.idc =ca.idc
      WHERE vd.idve = $request->idve");

      $totalventa = \DB::select("SELECT sum(vd.cantidad * vd.costo) as total
      from ventadetalles as vd where vd.idve = $request->idve");

      $categorias = categorias::all();
      $vendedores =vendedores::all();
      $clientes =clientes::all();
    

      return view ('compra.carritoEdicion')
      ->with('ventas',$ventas[0])
      ->with('productosventa',$productosventa)
      ->with('totalventa',$totalventa[0])


      ->with('categorias',$categorias)
      ->with('vendedores',$vendedores)
      ->with('clientes',$clientes);
  }
  

}
