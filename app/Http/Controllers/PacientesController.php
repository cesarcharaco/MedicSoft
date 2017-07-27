<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pacientes;
use App\Http\Requests\PacientesRequest;
use Laracasts\Flash\flash;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes=Pacientes::all();
        $num=0;
        return View('admin.pacientes.index',compact('pacientes','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacientesRequest $request)
    {
        
        $paciente=Pacientes::where('cedula',$request->cedula)->first();

        if (count($paciente)>0) {
            flash("LA CÉDULA YA HA SIDO REGISTRADA!", 'error'); 
            return redirect()->route('pacientes.create')->withInput();
        } else {
            if ($request->titular!="Si") {
                $titular="No";
            } else {
                $titular="Si";
            }
            
            $paciente=Pacientes::create(['nombres' => $request->nombres,
                                         'apellidos' => $request->apellidos,
                                         'nacionalidad' => $request->nacionalidad,
                                         'cedula' => $request->cedula,
                                         'codigo_telf' => $request->codigo_telf,
                                         'telefono' => $request->telefono,
                                         'direccion' => $request->direccion,
                                         'titular' => $titular,
                                         'institucion' => $request->institucion]);
            flash("EL REGISTRO HA SIDO EXITOSO!", 'success');            
        }

        return redirect()->route('pacientes.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente=Pacientes::find($id);

        return View('admin.pacientes.edit',compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PacientesRequest $request, $id)
    {
        $paciente=Pacientes::where('cedula',$request->cedula)->where('id','<>',$id)->first();

        if (count($paciente)>0) {
            flash("LA CÉDULA YA HA SIDO REGISTRADA!", 'error'); 
            return redirect()->route('pacientes.edit')->withInput();
        } else {
            if ($request->titular!="Si") {
                $titular="No";
            } else {
                $titular="Si";
            }

            $paciente=Pacientes::find($id);
            $paciente->nombres=$request->nombres;
            $paciente->apellidos=$request->apellidos;
            $paciente->nacionalidad=$request->nacionalidad;
            $paciente->cedula=$request->cedula;
            $paciente->codigo_telf=$request->codigo_telf;
            $paciente->telefono=$request->telefono;
            $paciente->direccion=$request->direccion;
            $paciente->titular=$titular;
            $paciente->institucion=$request->institucion;
            $paciente->save();

            flash("LA ACTUALIZACIÓN HA SIDO EXITOSA!", 'success'); 
            return redirect()->route('pacientes.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //falta validar la existencia de paciente en otras tablas

        $paciente=Pacientes::find($request->id);
        if ($paciente->delete()) {
         flash("LA ELIMINACIÓN DEL REGISTRO HA SIDO EXITOSA!", 'success'); 
            
        } else {
            flash("DISCULPE, LA ELIMINACIÓN DEL REGISTRO NO HA SIDO EXITOSA!", 'error'); 
        }
        return redirect()->route('pacientes.index');
    }
}
