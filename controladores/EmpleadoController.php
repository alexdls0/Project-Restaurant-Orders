<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;

class EmpleadoController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Empleado::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $empleado = Empleado::create($request->all());   
        }catch(Exception $e){
            return response()->json([], 400);
        }
        return response()->json($empleado->id, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return response()->json(Empleado::find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $array = [];
        $status = 400;
        $empleado = Empleado::find($id);
        if($empleado != null){
            try{
                $array = $empleado->update($request->all());
                $status = 200;
            }catch(\Exception $e){
            }
        }
        return response()->json($array, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $result = Empleado::destroy($id);//forma 2 más fácil ya que lo busca y lo elimina
            if($result){
                return response()->json([], 204);
            }
            return response()->json([], 400);
        }catch(Exception $e){
            return response()->json([], 400);
        }
    }
    
    /*public function login($username){
        $empleado = Empleado::where('username',$username)->get();
        return response()->json($empleado[0], 200);
    }*/
    
    
}
