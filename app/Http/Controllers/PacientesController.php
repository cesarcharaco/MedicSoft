<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pacientes;
use App\Pacientes_nt;
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
                                         'institucion' => $request->institucion,
                                         'edad' => $request->edad,
                                         'genero' => $request->genero]);

            $pacientent=Pacientes_nt::create(['nombres' => $request->nombres,
                                         'apellidos' => $request->apellidos,
                                         'nacionalidad' => $request->nacionalidad,
                                         'cedula' => $request->cedula,
                                         'codigo_telf' => $request->codigo_telf,
                                         'telefono' => $request->telefono,
                                         'direccion' => $request->direccion,
                                         'titular' => 'Si',
                                         'edad' => $request->edad,
                                         'genero' => $request->genero,
                                         'id_paciente' => $paciente->id]);
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
            
            $paciente=Pacientes::find($id);
            $cedula=$paciente->cedula;
            $paciente->nombres=$request->nombres;
            $paciente->apellidos=$request->apellidos;
            $paciente->nacionalidad=$request->nacionalidad;
            $paciente->cedula=$request->cedula;
            $paciente->codigo_telf=$request->codigo_telf;
            $paciente->telefono=$request->telefono;
            $paciente->direccion=$request->direccion;
            $paciente->institucion=$request->institucion;
            $paciente->edad=$request->edad;
            $paciente->genero=$request->genero;
            $paciente->save();

            $pacientent=Pacientes_nt::where('cedula',$cedula)->first();
            $pacientent->nombres=$request->nombres;
            $pacientent->apellidos=$request->apellidos;
            $pacientent->nacionalidad=$request->nacionalidad;
            $pacientent->cedula=$request->cedula;
            $pacientent->codigo_telf=$request->codigo_telf;
            $pacientent->telefono=$request->telefono;
            $pacientent->direccion=$request->direccion;
            $pacientent->edad=$request->edad;
            $pacientent->genero=$request->genero;
            $pacientent->id_paciente=$id;
            $pacientent->save();

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
        $paciente=Pacientes::find($request->id);
        $pacientent=Pacientes_nt::where('id_paciente',$request->id)->get();
        if($pacientent->consultas->exists()){
            flash("DISCULPE, NO SE PUEDE ELIMINAR YA QUE SE ENCUENTRA EN REGISTROS DE CONSULTAS!", 'error'); 
        }else{
            if (count($pacientent)>1) {
              flash("DISCULPE, NO SE PUEDE ELIMINAR YA QUE EXISTEN PACIENTES QUE SE ENCUENTRAN COMO BENEFICIARIOS DE ESTE PACIENTE!", 'error');   
            } else {
                
                $pacientent->delete();
                if ($paciente->delete()) {
                 flash("LA ELIMINACIÓN DEL REGISTRO HA SIDO EXITOSA!", 'success'); 
                    
                } else {
                    flash("DISCULPE, LA ELIMINACIÓN DEL REGISTRO NO HA SIDO EXITOSA!", 'error'); 
                }
            }
        }
        return redirect()->route('pacientes.index');
    }
}
