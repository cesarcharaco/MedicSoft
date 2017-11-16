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
    public function edit(PedidosOficinas $pedidosOficinas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PedidosOficinas  $pedidosOficinas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PedidosOficinas $pedidosOficinas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PedidosOficinas  $pedidosOficinas
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidosOficinas $pedidosOficinas)
    {
        //
    }
}
