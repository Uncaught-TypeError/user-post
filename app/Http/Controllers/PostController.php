<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all()->sortbyDesc('created_at');
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all()->sortByDesc('created_at');
        return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'title'=>'required|max:255',
            'brand'=>'required|max:200',
            'description'=>'required',
            'category_id'=>'required',
            'photo'=>'required',
        ]);

        $post = $request->all();

        if($photo = $request->file('photo')){
            $path = 'photos/';
            $ext = date('YmdHis').".".$photo->getClientOriginalExtension();
            $photo->move($path,$ext);
            $post['photo']=$ext;
        }

        $post['user_id'] = Auth::user()->id;
        Post::create($post);
        return redirect()->route('posts.index')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = Post::find($id);
        $categories = Category::all()->sortByDesc('created_at');
        return view('posts.edit', compact('posts','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        // return $request;
        $request->validate([
            'title'=>'required|max:255',
            'brand'=>'required|max:200',
            'description'=>'required',
            'category_id'=>'required',
            'photo'=>'required',
        ]);
        $newpost = $request->all();
        if($photo = $request->file('photo')){
            $path = 'photos/';
            $ext = date('YmdHis').".".$photo->getClientOriginalExtension();
            $photo->move($path,$ext);
            $newpost['photo']=$ext;
        }
        $newpost['user_id'] = Auth::user()->id;
        $post->update($newpost);
        return redirect()->route('posts.index')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }
}
