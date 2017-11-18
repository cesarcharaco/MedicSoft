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
        $materiales=MaterialesSolicitados::select('id')->select('fecha')->groupBy('fecha')->get();
        $materiales2=MaterialesSolicitados::select('id')->select('fecha')->groupBy('fecha')->get();

       return View('admin.recepcion_materiales.create',compact('materiales','materiales2'));


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
        //
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
    public function edit(RecepcionMateriales $recepcionMateriales)
    {
        //
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
