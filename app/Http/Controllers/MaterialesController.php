<?php

namespace App\Http\Controllers;

use App\Materiales;
use Illuminate\Http\Request;
use App\Http\Requests\MaterialesRequest;

class MaterialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=0;
        $materiales=Materiales::all();

        return view('admin.materiales.index', compact('num','materiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.materiales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaterialesRequest $request)
    {
        $buscar=Materiales::where('tipo_material',$request->tipo_material)->where('modelo_marca',$request->modelo_marca)->get();

        if (count($buscar)>0) {
            flash("DISCULPE, ESTE TIPO DE MATERIAL Y MODELO/MARCA YA HA SIDO REGISTRADO!", 'error'); 
            return redirect()->route('materiales.create')->withInput();
        } else {
            if ($request->descripcion=="") {
                $descripcion="?";
            } else {
                $descripcion=$request->descripcion;
            }

            if ($request->serial=="") {
                $serial="?";
            } else {
                $serial=$request->serial;
            }
            
            if ($request->stock_min>$request->stock_max) {
                flash("DISCULPE, EL STOCK MÍNIMO NO PUEDE SER MAYOR AL STOCK MÁXIMO!", 'error'); 
            return redirect()->route('materiales.create')->withInput();
            } else {
                            
            $material=Materiales::create(['tipo_material' => $request->tipo_material,
                                         'descripcion' => $descripcion,
                                         'modelo_marca' => $request->modelo_marca,
                                         'serial' => $serial,
                                         'stock_min' => $request->stock_min,
                                         'stock_max' => $request->stock_max]);
            flash("MATERIAL REGISTRADO CON ÉXITO!", 'success'); 
            return redirect()->route('materiales.index');

            }
        }
                    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materiales  $materiales
     * @return \Illuminate\Http\Response
     */
    public function show(Materiales $materiales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materiales  $materiales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material=Materiales::find($id);

        return view('admin.materiales.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materiales  $materiales
     * @return \Illuminate\Http\Response
     */
    public function update(MaterialesRequest $request, $id)
    {
        $buscar=Materiales::where('tipo_material',$request->tipo_material)->where('modelo_marca',$request->modelo_marca)->where('id','<>',$id)->get();

        if (count($buscar)) {
            flash("DISCULPE, ESTE TIPO DE MATERIAL Y MODELO/MARCA YA HA SIDO REGISTRADO!", 'error'); 
            return redirect()->route('materiales.edit',$id)->withInput();
        } else {
            if ($request->descripcion=="") {
                $descripcion="?";
            } else {
                $descripcion=$request->descripcion;
            }

            if ($request->serial=="") {
                $serial="?";
            } else {
                $serial=$request->serial;
            }
            if ($request->stock_min>$request->stock_max) {
                flash("DISCULPE, EL STOCK MÍNIMO NO PUEDE SER MAYOR AL STOCK MÁXIMO!", 'error'); 
            return redirect()->route('materiales.edit',$id)->withInput();
            } else {
            $material=Materiales::find($id);
            $material->tipo_material=$request->tipo_material;
            $material->descripcion=$descripcion;
            $material->modelo_marca=$request->modelo_marca;
            $material->serial=$serial;
            $material->stock_min=$request->stock_min;
            $material->stock_max=$request->stock_max;
            $material->save();

            flash("MATERIAL ACTUALIZADO CON ÉXITO!", 'success'); 
            return redirect()->route('materiales.index');
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materiales  $materiales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //verificar en inventario antes de eliminar
        $material=Materiales::find($request->id);
        if ($material->delete()) {
            flash("MATERIAL ELIMINADO CON ÉXITO!", 'success'); 
            return redirect()->route('materiales.index');
        } else {
            flash("DISCULPE, EL MATERIAL NO PUDO SER ELIMINADO!", 'error'); 
            return redirect()->route('materiales.index');
        }
        
    }
}
