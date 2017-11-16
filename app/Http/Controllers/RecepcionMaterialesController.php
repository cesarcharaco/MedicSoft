<?php

namespace App\Http\Controllers;

use App\RecepcionMateriales;
use Illuminate\Http\Request;
use App\MaterialesRecibidos;
use App\Materiales;
use App\MaterialesSolicitados;
class RecepcionMaterialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recibidos=RecepcionMateriales::all();
        $num=0;

        return View('admin.recepcion_materiales.index',compact('recibidos','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function recibir($fecha)
    {
         $materiales=MaterialesSolicitados::where('fecha',$fecha)->get();
        

       return View('admin.recepcion_materiales.create',compact('materiales','materiales2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $cont=0;
        for ($i=0; $i < count($request->cantidad); $i++) { 
            if($request->cantidad>$request->stock_max){
                $cont++;
            }
        }
        if ($cont>0) {
        flash("DISCULPE, SE HA REGISTRADO UNA CANTIDAD DE ALGÚN MATERIAL POR ENCIMA DEL STOCK MÁXIMO DEL MATERIAL, VERIFIQUE LA INFORMACIÓN SUMINISTRADA!", 'error'); 
                return redirect()->back()->withInput();
        } else {
            for ($i=0; $i <count($request->id_material) ; $i++) { 
                $material=Materiales::find($request->id_material[$i]);
                $material->disponible=$material->disponible+$request->cantidad[$i];
                $material->save();
            }
            $fecha=date('Y-m-d');
            $recibidos=RecepcionMateriales::create(['fecha_solicitud' => $request->fecha,
                'fecha_entrega' => $fecha,
                'responsable' => $request->responsable]);
            for ($i=0; $i < count($request->id_material) ; $i++) { 
                $materiales=MaterialesRecibidos::create(['id_materialesrec' => $recibidos->id,
                    'id_material' => $request->id_material[$i],
                    'cantidad' => $request->cantidad[$i]]);
            }
        flash('ACTUALIZACIÓN EXITOSA DE LA DISPONIBILIDAD DE LOS MATERIALES RECIBIDOS');
            return redirect()->route('materiales.index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RecepcionMateriales  $recepcionMateriales
     * @return \Illuminate\Http\Response
     */
    public function show(RecepcionMateriales $recepcionMateriales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RecepcionMateriales  $recepcionMateriales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecepcionMateriales  $recepcionMateriales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecepcionMateriales $recepcionMateriales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecepcionMateriales  $recepcionMateriales
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecepcionMateriales $recepcionMateriales)
    {
        //
    }
}
