<?php

namespace App\Http\Controllers;

use App\Medicos;
use App\Especialidades;
use Illuminate\Http\Request;
use App\Http\Requests\MedicosRequest;
use Laracasts\Flash\flash;
class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos=Medicos::all();
        $num=0;

        return view('admin.medicos.index', compact('medicos','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades=Especialidades::all();
        $espec_listas=Medicos::all();

        return view('admin.medicos.create', compact('especialidades','espec_listas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicosRequest $request)
    {
        $medico=Medicos::where('cedula',$request->cedula)->first();

        if (count($medico)>0) {
            flash("LA CÉDULA YA HA SIDO REGISTRADA!", 'error'); 
            return redirect()->route('medicos.create')->withInput();
        } else {
            $medico=Medicos::create(['nombres' => $request->nombres,
                                     'apellidos' => $request->apellidos,
                                     'nacionalidad' => $request->nacionalidad,
                                     'cedula' => $request->cedula,
                                     'codigo_telf' => $request->codigo_telf,
                                     'telefono' => $request->telefono,
                                     'direccion' => $request->direccion,
                                     'id_especialidad' => $request->id_especialidad]);
            flash("EL REGISTRO HA SIDO EXITOSO!", 'success');            
        }
         return redirect()->route('medicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function show(Medicos $medicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especialidades=Especialidades::all();
        $espec_listas=Medicos::all();
        $medico=Medicos::find($id);

        return view('admin.medicos.edit', compact('especialidades','espec_listas','medico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function update(MedicosRequest $request,$id)
    {
        $medico=Medicos::where('cedula',$request->cedula)->where('id','<>',$id)->first();

        if (count($medico)>0) {
            flash("LA CÉDULA YA HA SIDO REGISTRADA!", 'error'); 
            return redirect()->route('medicos.edit')->withInput();
        } else {

            $medico=Medicos::find($id);
            $medico->nombres=$request->nombres;
            $medico->apellidos=$request->apellidos;
            $medico->nacionalidad=$request->nacionalidad;
            $medico->cedula=$request->cedula;
            $medico->codigo_telf=$request->codigo_telf;
            $medico->telefono=$request->telefono;
            $medico->direccion=$request->direccion;
            if($request->desbloquear=="Si"){
            $medico->id_especialidad=$request->id_especialidad;
            }
            $medico->save();

            flash("LA ACTUALIZACIÓN HA SIDO EXITOSA!", 'success'); 
            return redirect()->route('medicos.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicos  $medicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //verificar si se encuentra en otra tabla

         $medico=Medicos::find($request->id);
        if ($medico->delete()) {
         flash("LA ELIMINACIÓN DEL REGISTRO HA SIDO EXITOSA!", 'success'); 
            
        } else {
            flash("DISCULPE, LA ELIMINACIÓN DEL REGISTRO NO HA SIDO EXITOSA!", 'error'); 
        }
        return redirect()->route('medicos.index');
    }
}
