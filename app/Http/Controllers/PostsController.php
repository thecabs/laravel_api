<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all();
        return $posts;
        if (count($posts) <= 0 ){
            return response([ "message" => "Aucun post(s) publié (s)"], 201);
        }
        return response($posts,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $postsValidation = $request ->validate ([
            "content" =>["required","string"], 
            "slug" =>["string"]
             
        ]);

         
        $posts = Posts::create ([
            "content" => $postsValidation["content"],
          
            "slug" => SlugService::createSlug(Posts::class, 'slug', $request->content[0])         
        ]);

        return response (["message" => "Post  Publié"],201);


     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Posts::with('posts')
            ->where('id', $id)
            ->first();
           
            $posts = Posts::find($id);
        if (!$posts){
            return response([ "message" => "Aucun Post n'a été trouvé  avec cet id : $id"], 404);
        }
        return $posts;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts, $id)
    {
        $value = Posts :: destroy($id);

        if(boolval($value)==false){
            return response (["message" => "Aucun Post n'a été trouvé  avec cet id : $id"],404);
        }
        return response(["message"=>"Post supprimé"],200);

    }
}
