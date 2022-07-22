<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    //
    public function home(Request $request)
    {
        
        //dd($_REQUEST); //lenguaje PHP
        //dd($request->all()); //con laravel, más amigable lo que hace el lenguaje de PHP
        $search = $request->search;
        $posts = Post::where('title', 'LIKE', "%{$search}%")->with('user')->latest()->paginate();//filtro para busqueda de titulos de post

        /*
        if(!isset($request->search))//verifica si está recibiendo una petición
        {
            $posts = Post::latest()->paginate(); //Lista todas las publicaciones de orden desc y paginado
        }else{
            $search = $request->search;
            $posts = Post::where('title', 'LIKE', "%{$search}%")->latest()->paginate();//filtro para busqueda de titulos de post
        }
        */
        
        return view('home', ['posts' => $posts]);
    }

    public function blog()
    {
        //consulta a base de datos
        /*$posts = [
            ['id'=> 1, 'title' => 'PHP', 'slug' => 'php'],
            ['id'=> 2, 'title' => 'JAVA', 'slug' => 'java']
        ];*/

        //$posts =  Post::get(); //Obtiene todos los registros
        //$posts = Post::first(); //Obtiene el primer registro
        /*$posts = Post::find(25); //Encuentra el registro por id

        dd($posts);*/

        $posts = Post::latest()->paginate();
        //dd($posts);

        return view('blog', ['posts' => $posts]);
    }

    public function post(Post $post)
    {
        //$post = $slug;

        return view('post', ['post' => $post]);
    }
}
