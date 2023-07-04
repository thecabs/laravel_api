<?php

namespace App\Http\Controllers;

use App\Models\Beats;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BeatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beats = Beats::all();
        return $beats;
        if (count($beats) <= 0 ){
            return response([ "message" => "Aucun Beat(s) publié(s)"], 201);
        }
        return response($beats,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $beatsValidation = $request ->validate ([
            "title" =>["required","string"], 
            "premium_file" =>["required","mimes:mp3,m4a","max:4096"], 
            "free_file" =>["required","mimes:mp3,m4a","max:4096"], 
            "slug" =>["string"]
             
        ]);

        $pathpf = $request->file('premium_file')->store("local/premium_beats");
        $pathff = $request->file('free_file')->store("public/free_files");


        $beats = Beats::create ([
            "slug" => SlugService::createSlug(Beats::class, 'slug', $request->title),
            "title" => $beatsValidation["title"],
            "premium_file" => $pathpf,
            "free_file" => $pathff
                    
        ]);

        return response (["message" => "Beats  Publié"],201);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beats  $beats
     * @return \Illuminate\Http\Response
     */
    public function show(Beats $id)
    {
        $beats = Beats::with('beats')
        ->where('id', $id)
        ->first();       
        $beats = Beats::find($id);
    if(!$beats){
        return response([ "message" => "Aucun Beat n'a été trouvé  avec cet id : $id"], 404);
    }
    return $beats;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beats  $beats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beats $beats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beats  $beats
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beats $beats)
    {
        //
    }
}
