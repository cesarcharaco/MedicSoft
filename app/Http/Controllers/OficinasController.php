<?php

namespace App\Http\Controllers;

use App\Oficinas;
use Illuminate\Http\Request;
use App\PedidosOficinas;
use App\Http\Requests\OficinasRequest;

class OficinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=0;
        $oficinas=Oficinas::all();

        return view('admin.oficinas.index', compact('num','oficinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.oficinas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OficinasRequest $request)
    {
        $buscar=Oficinas::where('oficina',$request->oficina)->get();
        if (count($buscar)>0) {
            flash("DISCULPE, LA OFICINA YA HA SIDO REGISTRADA!", 'error'); 
                    return redirect()->route('oficinas.create')->withInput();
        } else {
            $oficina=Oficinas::create(['oficina' => $request->oficina]);
            flash("OFICINA REGISTRADA CON ÉXITO!", 'success'); 
            return redirect()->route('oficinas.index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function show(Oficinas $oficinas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oficina=Oficinas::find($id);

        return view('admin.oficinas.edit', compact('oficina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function update(OficinasRequest $request, $id)
    {
        $buscar=Oficinas::where('oficina',$request->oficina)->where('id','<>',$id)->get();
        if (count($buscar)>0) {
            flash("DISCULPE, LA OFICINA YA HA SIDO REGISTRADA!", 'error'); 
                    return redirect()->route('oficinas.edit')->withInput();
        } else {
            $oficina=Oficinas::find($id);
            $oficina->oficina=$request->oficina;
            $oficina->save();
            flash("OFICINA ACTUALIZADA CON ÉXITO!", 'success'); 
                    return redirect()->route('oficinas.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $oficina=Oficinas::find($request->id);
        $buscar=PedidosOficinas::where('id_oficina',$request->id)->get();
        if (count($buscar)>0) {
            flash("DISCULPE, LA OFICINA NO PUDO SER ELIMINADA DEBIDO A QUE SE ENCUENTRA RELACIONADA CON UNO O VARIOS PEDIDOS DE MATERIALES!", 'error'); 
                    return redirect()->route('oficinas.index');
        } else {
                    
        if ($oficina->delete()) {
            flash("LA OFICINA HA SIDO ELIMINADA DE FORMA EXITOSA!", 'success'); 
                    return redirect()->route('oficinas.index');
        } else {
            flash("DISCULPE, LA OFICINA NO PUDO SER ELIMINADA!", 'error'); 
                    return redirect()->route('oficinas.index');
        }
        
        }
    }
}
