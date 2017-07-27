<?php

namespace App\Http\Controllers;

use App\Horarios;
use App\Dias;
use App\Turnos;
use App\Especialidades;
use Illuminate\Http\Request;
use App\Http\Requests\HorariosRequest;
use Laracasts\Flash\flash;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios=Horarios::all();
        $dias=Dias::all();
        $turnos=Turnos::all();

        return view('admin.horarios.index', compact('horarios','dias','turnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dias=Dias::all();
        $turnos=Turnos::all();
        $especialidades=Especialidades::pluck('especialidad','id');

        return view('admin.horarios.create', compact('dias','turnos','especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HorariosRequest $request)
    {
        $cont=0;
        $msj=" ";
        foreach ($request->id_turno as $turno) {
            $horarios = Horarios::all();
            foreach ($horarios as $horario) {
                if($horario->id_turno==$turno and $horario->id_especialidad==$request->id_especialidad){
                    $cont++;
                    $msj.=" ".$horario->turnos->dias->dia." en la ".$horario->turnos->momento.", ";
                }
            }
        }
        //dd($msj);
        if ($cont>0) {
            flash("LA ESPECIALIDAD YA SE ENCUENTRA ASIGNADA A:  ".$msj, 'error'); 
            return redirect()->route('horarios.create')->withInput();
        } else {
            //dd($request->all());
            foreach ($request->id_turno as $turno) {
            $horario=Horarios::create(['id_especialidad' => $request->id_especialidad,
                'id_turno' => $turno,
                'estado' => 'Ocupado']);
            }
            flash("EL REGISTRO HA SIDO EXITOSO!", 'success'); 
            return redirect()->route('horarios.index');
            
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $especialidades= Especialidades::all();
        $num=0;
        $horarios=Horarios::select('id_especialidad')->groupBy('id_especialidad')->get();
        
        return view('admin.horarios.show', compact('especialidades','num','horarios'));

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function show2($id)
    {

        $horarios=Horarios::where('id_especialidad',$id)->get();
        $dias=Dias::all();
        $turnos=Turnos::all();

        return view('admin.horarios.show2', compact('horarios','dias','turnos'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_especialidad=$id;
        $dias=Dias::all();
        $turnos=Turnos::all();
        $especialidad=Especialidades::find($id);
        $horario=Horarios::where('id_especialidad',$id)->get();

        return view('admin.horarios.edit', compact('dias','turnos','especialidad','horario','id_especialidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function update(HorariosRequest $request,  $id)
    {
        $horario=Horarios::where('id_especialidad',$id)->get();
        foreach ($horario as $key => $bloque) {
            $hora=Horarios::find($bloque->id);
            $hora->delete();
        }
        
            foreach ($request->id_turno as $turno) {
            $horario=Horarios::create(['id_especialidad' => $request->id_especialidad,
                'id_turno' => $turno,
                'estado' => 'Ocupado']);
            }
            flash("LA ACTUALIZACIÓN HA SIDO EXITOSA!", 'success'); 
            return redirect()->route('admin.horarios.show2',$id);
         
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $horario=Horarios::where('id_especialidad',$request->id)->get();
        $cuantos=count($horario);
        $cont=0;
        foreach ($horario as $key => $bloque) {
            $hora=Horarios::find($bloque->id);
            if($hora->delete()){
                $cont++;
            }

        }

        if ($cont==$cuantos) {
            flash("LA ELIMINACIÓN HA SIDO EXITOSA!", 'success'); 
        } else {
            flash("LA ELIMINACIÓN HA SIDO EXITOSA!", 'success'); 
        }
        
            return redirect()->route('horarios.index');
    }
}
