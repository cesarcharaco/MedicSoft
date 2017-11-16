<?php

namespace App\Http\Controllers;

use App\PedidosOficinas;
use Illuminate\Http\Request;
use App\Materiales;
use App\Oficinas;
use App\Http\Requests\PedidosOficinasRequest;
class PedidosOficinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=0;
        $pedidos_oficinas=PedidosOficinas::all();
        //dd($pedidos_oficinas->load('materiales'));
        return view('admin.pedidos_oficinas.index', compact('num','pedidos_oficinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oficinas=Oficinas::pluck('oficina','id');
        $materiales=Materiales::all();
        $materiales2=Materiales::all();
        return view('admin.pedidos_oficinas.create',compact('oficinas','materiales','materiales2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidosOficinasRequest $request)
    {
        //dd($request->all());

        $fecha_cod=date('dmy');
        $fecha=date('Y-m-d');
        $buscar=PedidosOficinas::where('fecha',$fecha)->get();
        $codigo=$fecha_cod."".count($buscar)+1;
        //dd($codigo);
        //verificando que la cantidad solicitada no sea mayor a la disponible
        $cont=0;
        for ($i=1; $i <count($request->cantidad) ; $i++) { 
            $material=Materiales::find($request->id_material[$i]);
            $disponible=$material->disponible-$material->stock_min;
            if ($request->cantidad[$i]>$disponible) {
                $cont++;
            }
        }
        if ($cont>0) {
            flash("DISCULPE, HA AGREGADO UNA CANTIDAD PARA UN MATERIAL QUE SUPERA LO DISPONIBLE", 'error'); 

        return redirect()->back()->withInput();   
        } else {
            //descontando del material lo solicitado
            for ($i=1; $i <count($request->cantidad) ; $i++) { 
                $material=Materiales::find($request->id_material[$i]);
                $material->disponible=$material->disponible-$request->cantidad[$i];
                $material->save();
            }
            $pedido=PedidosOficinas::create(['id_oficina' => $request->id_oficina,
                                    'solicitante' => $request->empleado,
                                    'nacionalidad' => $request->nacionalidad,
                                    'cedula' => $request->cedula,
                                    'fecha' => $fecha,
                                    'codigo' => $codigo]);

            for ($i=1; $i <count($request->cantidad) ; $i++) { 
                $materiales=\DB::table('materiales_pedidos')->insert([
                    'id_pedido' => $pedido->id,
                    'id_material' => $request->id_material[$i],
                    'cantidad' => $request->cantidad[$i]]);
            }
             flash("PEDIDO REALIZADO CON ÉXITO", 'success'); 

            return redirect()->route('pedidos_oficinas.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PedidosOficinas  $pedidosOficinas
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $num=0;
        $pedidos_oficinas=PedidosOficinas::all();
        //dd($pedidos_oficinas->load('materiales'));
        return view('admin.pedidos_oficinas.show', compact('num','pedidos_oficinas'));
    }

    public function vermateriales($id)
    {
        $num=0;
        $pedidos_oficinas=PedidosOficinas::where('id',$id)->get();
        //dd($pedidos_oficinas->load('materiales'));
        return view('admin.pedidos_oficinas.vermateriales', compact('num','pedidos_oficinas'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PedidosOficinas  $pedidosOficinas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido=PedidosOficinas::find($id);
        $materiales=Materiales::all();
        $materiales2=Materiales::all();
        $oficinas=Oficinas::pluck('oficina','id');
        return view('admin.pedidos_oficinas.edit', compact('pedido','materiales','materiales2','oficinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PedidosOficinas  $pedidosOficinas
     * @return \Illuminate\Http\Response
     */
    public function update(PedidosOficinasRequest $request,$id)
    {
        //dd($request->all());

        
        $pedido=PedidosOficinas::find($id);
        
        //dd($pedido);
        //buscando las cantidades actuales de los materiales del pedido
        foreach ($pedido->materiales as $key) {
            $material=Materiales::find($key->pivot->id_material);
            //devolviendo la cantidad que se restó
            $nueva_cantidad=$material->disponible+$key->pivot->cantidad;
            $material->disponible=$nueva_cantidad;
            $material->save();

        }
        

        //verificando que la cantidad solicitada no sea mayor a la disponible
        $cont=0;

        for ($i=1; $i <count($request->cantidad) ; $i++) { 
            $material2=Materiales::find($request->id_material[$i]);
            $disponible=$material2->disponible-$material->stock_min;
            if ($request->cantidad[$i]>$disponible) {
                $cont++;
            }
        }
        if ($cont>0) {
            flash("DISCULPE, HA AGREGADO UNA CANTIDAD PARA UN MATERIAL QUE SUPERA LO DISPONIBLE", 'error'); 

        return redirect()->back()->withInput();   
        } else {
            //eliminando registro en pedido_materiales
            foreach ($pedido->materiales as $key) {
                $pedido->materiales()->detach($key->pivot->id_material);    
            }
            
            
            //descontando del material lo solicitado
            for ($i=1; $i <count($request->cantidad) ; $i++) { 
                $material3=Materiales::find($request->id_material[$i]);
                $material3->disponible=$material3->disponible-$request->cantidad[$i];
                $material3->save();
            }
            $pedido->id_oficina=$request->id_oficina;
            $pedido->solicitante=$request->empleado;
            $pedido->nacionalidad=$request->nacionalidad;
            $pedido->cedula=$request->cedula;
            $pedido->save();

            for ($i=1; $i <count($request->cantidad) ; $i++) { 
                $materiales=\DB::table('materiales_pedidos')->insert([
                    'id_pedido' => $pedido->id,
                    'id_material' => $request->id_material[$i],
                    'cantidad' => $request->cantidad[$i]]);
            }
             flash("PEDIDO ACTUALIZADO CON ÉXITO", 'success'); 

            return redirect()->route('pedidos_oficinas.index');
        }
    }

    public function seleccionarfecha()
    {
        return view('admin.pedidos_oficinas.seleccionar_fecha');
    }

    public function buscarpedidos(Request $request)
    {
        //dd($request->fecha);
        $pedidos=PedidosOficinas::where('fecha',$request->fecha)->get();
        //dd($pedidos);
        if (count($pedidos)==0) {
            flash("DISCULPE NO EXISTEN PEDIDOS REALIZADOS PARA ESA FECHA", 'error'); 

            return redirect()->back();
        } else {
            
        
        $totales=array();
        $materialesx=array();
        $cantidades=array();
        $materiales=Materiales::all();
        $modelo=array();
        $serial=array();
        $i=0;
        foreach ($materiales as $key) {
            $totales[$i]=0;
            $cont=0;
            foreach ($pedidos as $key2) {
                $cont2=0;
                
                foreach ($key2->materiales as $key3) {
                    
                    if($key3->pivot->id_material==$key->id){
                        $cont2+=$key3->pivot->cantidad;
                        if ($key->descripcion!="?") {
                            $materialesx[$i]=$key->tipo_material." ".$key->descripcion;
                        } else {
                            $materialesx[$i]=$key->tipo_material;
                        }
                        if ($key->modelo_marca!="?") {
                            $modelo[$i]=$key->modelo_marca;
                        } else {
                            $modelo[$i]="";
                        }
                        if ($key->serial!="?") {
                            $serial[$i]=$key->serial;
                        } else {
                            $serial[$i]="";
                        }
                        if ($cont2!=0) {
                            $totales[$i]+=$cont2;
                        }
                        
                        
                    }
                    //echo $i."--";
                }
            $cont+=$cont2;
            }
            if ($cont2!=0) {
               $i++;
            }
            
        }
        $fin=count($totales)-1;
        for ($j=0; $j < $fin; $j++) { 
            $cantidades[$j]= $totales[$j];
        }
        for ($x=0; $x < $fin; $x++) { 
            $tabla[$x][0]=$cantidades[$x];
            $tabla[$x][1]=$materialesx[$x];
            $tabla[$x][2]=$modelo[$x];
            $tabla[$x][3]=$serial[$x];
        }
        $fecha=date('Y-m-d');
        $num=0;
    $dompdf = \PDF::loadView('admin.pdfs.reportes.reportepedidos', ['num' => $num,'tabla' => $tabla,'fin' => $fin,'fecha' => $fecha])->setPaper('a4', 'portrait');

                    return $dompdf->stream('ReportePedidos_'.$fecha.'.pdf');        
        
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PedidosOficinas  $pedidosOficinas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pedido=PedidosOficinas::find($request->id);
        //buscando las cantidades actuales de los materiales del pedido
        foreach ($pedido->materiales as $key) {
            $material=Materiales::find($key->pivot->id_material);
            //devolviendo la cantidad que se restó
            $nueva_cantidad=$material->disponible+$key->pivot->cantidad;
            $material->disponible=$nueva_cantidad;
            $material->save();

        }
        foreach ($pedido->materiales as $key) {
            $pedido->materiales()->detach($key->pivot->id_material);
        }
        $pedido->delete();

        flash("PEDIDO ELIMINADO CON ÉXITO", 'success'); 

            return redirect()->route('pedidos_oficinas.index');
    }
}
