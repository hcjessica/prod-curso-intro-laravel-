@csrf
<!--Directiva que debe estar en los formularios-->

<label class="uppercase text-gray-700 text-xs">Titulo</label>
<span class="text-xs text-red-600">@error('title') {{ $message}} @enderror</span>
<input type="text" name="title" class="rounded border-gray-200 w-full mb4" value="{{ old('title', $post->title) }}"> <!--directiva para create, para no recibir obj. vacío {{ @$post->title}}-->

<label class="uppercase text-gray-700 text-xs">Slug</label>
<span class="text-xs text-red-600">@error('slug') {{ $message}} @enderror</span>
<input type="text" name="slug" class="rounded border-gray-200 w-full mb4" value="{{ old('slug', $post->slug) }}"> <!--directiva para create, para no recibir obj. vacío {{ @$post->title}}-->

<label class="uppercase text-gray-700 text-xs">Contenido</label>
<span class="text-xs text-red-600">@error('body') {{ $message}} @enderror</span>
<textarea rows="5" name="body"  class="rounded border-gray-200 w-full mb4">{{ old('body', $post->body) }}</textarea><!--directiva para create, para no recibir obj. vacío {{ @$post->body}}-->

<div class="flex justify-between items-center">
    <a href="{{route('posts.index')}}" class="text-indigo-600">Volver</a>

    <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2">
</div>
