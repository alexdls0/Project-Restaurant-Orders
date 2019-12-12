<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mesa;

class MesaController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Mesa::all(), 200);
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
            $mesa = Mesa::create($request->all());   
        }catch(Exception $e){
            return response()->json([], 400);
        }
        return response()->json($mesa->id, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return response()->json(Mesa::find($id), 200);
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
        $mesa = Mesa::find($id);
        if($mesa != null){
            try{
                $array = $mesa->update($request->all());
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
            $result = Mesa::destroy($id);//forma 2 más fácil ya que lo busca y lo elimina
            if($result){
                return response()->json([], 204);
            }
            return response()->json([], 400);
        }catch(Exception $e){
            return response()->json([], 400);
        }
    }
    
    public function upload(Request $request)
    {
        if($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $target = 'upload/';
            $name = $file->getClientOriginalName();
            $file->move($target, $name);
            return 'image uploaded';
        }
        return 'error uploading image';
    }
}
