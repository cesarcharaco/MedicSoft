<?php

namespace App\Http\Controllers;

use App\Especialidades;
use App\Http\Requests\EspecialidadesRequest;
use Illuminate\Http\Request;
use Laracasts\Flash\flash;


class EspecialidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidades=Especialidades::all();
        $num=0;
        return View('admin.especialidades.index',compact('especialidades','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecialidadesRequest $request)
    {
        $especialidad=Especialidades::where('especialidad',$request->especialidad)->first();
        if (count($especialidad)>0) {
            flash("EL NOMBRE DE LA ESPECIALIDAD YA SE ENCUENTRA REGISTRADO!", 'error'); 
            return redirect()->route('especialidades.create')->withInput();
        } else {
            $especialidades=Especialidades::create(['especialidad' => $request->especialidad]);
            flash("EL REGISTRO HA SIDO EXITOSO!", 'success'); 
            return redirect()->route('especialidades.index');
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especialidades  $especialidades
     * @return \Illuminate\Http\Response
     */
    public function show(Especialidades $especialidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especialidades  $especialidades
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especialidad=Especialidades::find($id);

        return View('admin.especialidades.edit',compact('especialidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especialidades  $especialidades
     * @return \Illuminate\Http\Response
     */
    public function update(EspecialidadesRequest $request,$id)
    {
        $especialidad=Especialidades::where('especialidad',$request->especialidad)->where('id','<>',$id)->first();
        if (count($especialidad)>0) {
            flash("EL NOMBRE DE LA ESPECIALIDAD YA SE ENCUENTRA REGISTRADO!", 'error'); 
            return redirect()->route('especialidades.edit')->withInput();
        } else {
            $especialidad=Especialidades::find($id);
            $especialidad->especialidad=$request->especialidad;
            $especialidad->save();

            flash("LA ACTUALIZACIÓN HA SIDO EXITOSA!", 'success'); 
            return redirect()->route('especialidades.index');
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especialidades  $especialidades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //hay que verificar que no se encuentra en otra relación

        $especialidad=Especialidades::find($request->id);
        if ($especialidad->delete()) {
            flash("LA ELIMINACIÓN HA SIDO EXITOSA!", 'success'); 
        } else {
            flash("DISCULPE, LA ELIMINACIÓ NO HA SIDO EXITOSA!", 'error'); 
        }
        
        return redirect()->route('especialidades.index');
    }
}
