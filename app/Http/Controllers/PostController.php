<?php

namespace App\Http\Controllers;

Use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function create(Post $post)
    //public function create()  en _form.blade.php con directiva @ en los valores de title y body  no es necesario enviar objeto vacio
    {
        //null to avoid bug
        return view('posts.create', ['post' => $post]);
        //return view('posts.create');
    }

    public function store(Request $request)
    {//se recibe una petición

        //validando campos de datos del formulario recibido
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',//valida campo único en referencia a la columna de la tabla posts
            'body' => 'required',
        ]);

        //tomamos la información del usuario y se indica la relación
        $post = $request->user()->posts()->create([
            'title' => $request->title,
            //'title' => $title = $request->title,
            //'slug' => Str::slug($title),
            'slug' => $request->slug,
            'body' => $request->body,
        ]);

        //redirige
        return redirect()->route('posts.edit', $post);
    }
 
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {//se recibe una petición

        //validando campos de datos del formulario recibido
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug' . $post->id,//valida campo único en referencia a la columna de la tabla posts a excepción del registro a editar
            'body' => 'required',
        ]);

        //actualizamos la tabla
        $post->update([
            'title' => $request->title,
            //'title' => $title = $request->title,
            //'slug' => Str::slug($title),
            'slug' => $request->slug,
            'body' => $request->body,
        ]);

        //redirige
        return redirect()->route('posts.edit', $post);
    }

    public function index()
    {
        
        return view('posts.index', ['posts' => Post::latest()->paginate()]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();//retornar vista anterior
    }

    
}
