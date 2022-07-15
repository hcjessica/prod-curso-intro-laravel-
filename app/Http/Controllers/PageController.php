<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    //
    public function home()
    {
        return view('home');
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
