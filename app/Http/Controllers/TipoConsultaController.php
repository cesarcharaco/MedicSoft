<?php

namespace App\Http\Controllers;

use App\Tipo_consulta;
use App\Especialidades;
use Illuminate\Http\Request;
use App\Http\Requests\TipoConsultaRequest;
use Laracasts\Flash\flash;

class TipoConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoconsultas=Tipo_consulta::all();
        $num=0;

        return view('admin.tipoconsultas.index', compact('tipoconsultas','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades=Especialidades::pluck('especialidad','id');

        return view('admin.tipoconsultas.create', compact('especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoConsultaRequest $request)
    {
        
        $tipoconsulta=Tipo_consulta::where('consulta',$request->consulta)->where('id_especialidad',$request->id_especialidad)->first();
        if (count($tipoconsulta)>0) {
             flash("ESTE TIPO DE CONSULTA YA SE ENCUENTRA ASIGNADA A DICHA ESPECIALIDAD!", 'error'); 
            return redirect()->route('tipoconsultas.create')->withInput();
        } else {
            $tipoconsulta=Tipo_consulta::create(['consulta' => $request->consulta, 'id_especialidad' => $request->id_especialidad]);
            flash("EL REGISTRO HA SIDO EXITOSO!", 'success'); 
            return redirect()->route('tipoconsultas.index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipo_consulta  $tipo_consulta
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo_consulta $tipo_consulta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipo_consulta  $tipo_consulta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoconsulta=Tipo_consulta::find($id);
        $especialidades=Especialidades::pluck('especialidad','id');
        return view('admin.tipoconsultas.edit', compact('tipoconsulta','especialidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipo_consulta  $tipo_consulta
     * @return \Illuminate\Http\Response
     */
    public function update(TipoConsultaRequest $request, $id)
    {
        $tipoconsulta=Tipo_consulta::where('consulta',$request->consulta)->where('id_especialidad',$request->id_especialidad)->where('id','<>',$id)->first();
        if (count($tipoconsulta)>0) {
             flash("ESTE TIPO DE CONSULTA YA SE ENCUENTRA ASIGNADA A UNA ESPECIALIDAD!", 'error'); 
            return redirect()->route('tipoconsultas.edit')->withInput();
        } else {
            $tipoconsulta=Tipo_consulta::find($id);
            $tipoconsulta->consulta=$request->consulta;
            $tipoconsulta->id_especialidad=$request->id_especialidad;
            $tipoconsulta->save();
            flash("LA ACTUALIZACIÓN HA SIDO EXITOSA!", 'success'); 
            return redirect()->route('tipoconsultas.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipo_consulta  $tipo_consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //VERIFICAR SI NO EXISTE EN ALGUN OTRO REGISTRO
        $tipoconsulta=Tipo_consulta::find($request->id);
        if (count($tipoconsulta)>0) {
            if ($tipoconsulta->delete()) {
                flash("LA ELIMINACIÓN HA SIDO EXITOSA!", 'success'); 
            } else {
                flash("DISCULPE, LA ELIMINACIÓN NO HA SIDO EXITOSA!", 'error'); 
            }
            
        } else {
            flash("DISCULPE, EL REGISTRO NO EXISTE!", 'warning'); 
        }
        
        return redirect()->route('tipoconsultas.index');

    }
}
