<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() /**вывод записей*/
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() /**добавление*/
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required'
        ]);
        $post = new Post([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email')
        ]);

        $post->save();

        return  redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id) /**редактирование*/
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) /*редактирование*/
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required'
        ]);

        $post = Post::find($id);
        $post->name = $request->get('name');
        $post->phone = $request->get('phone');
        $post->email = $request->get('email');

        $post->save();

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) /**удаление*/
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('posts');
    }

    public function search(Request $request) /**поиск*/
    {
        /*$s = $request->s;

        $users = Posts::where('name', 'LIKE', "% {$s}%")->orderBy('name')->get();

        return view('home', compact('users'));*/

        $search = $request->search;

        $post = DB::table('posts')->where( 'name','LIKE', "%.$search.%")->orderBy('name');

        return view('home', compact('posts'));


        /*$search = $request->get('search');

        $post = DB::table('posts')->where('name', 'LIKE', "%.$search.%");
        return view('posts', ['posts' => $post]);*/
    }
}
