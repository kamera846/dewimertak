<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.post', [
            'profile' => Profile::get()[0],
            'posts' => Post::latest()->get(),
            'postPage' => true,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.post-create', [
            'profile' => Profile::get()[0],
            'categories' => PostCategory::all(),
            'postPage' => true,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255|unique:posts',
            'image' => 'required|file|image|max:2048',
            'category' => 'required',
            'tags' => 'max:255',
            'content' => 'required' 
        ]);
        $validated['slug'] = Str::of($request->title)->slug('-');
        $validated['user_id'] = Auth::user()->id;
        $validated['category_id'] = $request->category;
        $validated['image'] = $request->file('image')->store('/');
        
        Post::create($validated);

        return redirect('/dashboard/posts')->with('success', 'Berhasil menambah postingan baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.post-detail', [
            'profile' => Profile::get()[0],
            'post' => $post,
            'postPage' => true,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.post-edit', [
            'profile' => Profile::get()[0],
            'post' => $post,
            'categories' => PostCategory::all(),
            'postPage' => true,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'image' => 'file|image|max:2048',
            'category' => 'required',
            'tags' => 'max:255',
            'content' => 'required' 
        ];

        if($request->title != $post->title)
        {
            $rules['title'] = 'required|max:255|unique:posts';
        }

        $validated = $request->validate($rules);

        if($request->title != $post->title)
        {
            $validated['slug'] = Str::of($request->title)->slug('-');
        }

        $validated['category_id'] = $validated['category'];
        unset($validated['category']);

        if($request->file('image'))
        {
            $validated['image'] = $request->file('image')->store('/');
            Storage::delete($post->image);
        }

        Post::where('id', $post->id)
                ->update($validated);

        return redirect('/dashboard/posts')->with('success', 'Berhasil memperbarui data postingan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        Storage::delete($post->image);

        return redirect('/dashboard/posts')->with('success', 'Berhasil menghapus postingan!');
    }
}
