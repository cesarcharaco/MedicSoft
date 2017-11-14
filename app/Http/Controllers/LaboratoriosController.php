<?php

namespace App\Http\Controllers;

use App\Laboratorios;
use Illuminate\Http\Request;
use App\Tipo_consulta;
use App\ConsultasLab;
class LaboratoriosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoconsulta=Tipo_consulta::where('id_especialidad',11)->get();

        $laboratorios=Laboratorios::all();

        if (count($tipoconsulta)==count($laboratorios)) {
            $num=0;
            return view('admin.laboratorios.index', compact('laboratorios','num'));
        } else {
            if(count($laboratorios)==0){
                foreach ($tipoconsulta as $key) {
                    $laboratorio=Laboratorios::create(['id_tipoconsulta' => $key->id,
                                                        'disponibilidad' => 'Si']);
                }
            }else{
                foreach ($tipoconsulta as $key) {
                    $cont=0;
                    foreach ($laboratorios as $key2) {
                        if ($key2->id_tipoconsulta==$key->id) {
                            $cont++;
                        }
                    }
                    if ($cont==0) {
                        $laboratorio=Laboratorios::create(['id_tipoconsulta' => $key->id,'disponibilidad' => 'Si']);       
                    }
                }
            }
            $laboratorios=Laboratorios::all();
            $num=0;
            return view('admin.laboratorios.index', compact('laboratorios','num'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Laboratorios  $laboratorios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fecha=date('Y-m-d');
        $consultalab=ConsultasLab::where('fecha',$fecha)->get();
        $num=0;
        return view('admin.laboratorios.show', compact('consultalab','num'));;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laboratorios  $laboratorios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laboratorios  $laboratorios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $laboratorio=Laboratorios::find($request->id_laboratorio);

        if($laboratorio->disponibilidad=="Si"){
            $laboratorio->disponibilidad="No";
            $dispo="No";
        }else{
            $laboratorio->disponibilidad="Si";
            $dispo="Si";
        }
        $laboratorio->save();
        flash("DISPONIBILIDAD CAMBIADA A ".$dispo, 'success'); 
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laboratorios  $laboratorios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratorios $laboratorios)
    {
        //
    }
}
