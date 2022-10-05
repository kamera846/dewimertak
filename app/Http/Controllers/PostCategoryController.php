<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostCategory;
use Illuminate\Support\Str;
use App\Models\Profile;
use App\Models\Post;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.post-category', [
            'profile' => Profile::get()[0],
            'postCategories' => PostCategory::latest()->get(),
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
        // 
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
            'name' => 'required|min:3|max:50|unique:post_categories'
        ]);
        
        $validated['slug'] = str::of($request->name)->slug('-');

        PostCategory::create($validated);

        return redirect('/dashboard/post-categories')->with('success', 'Berhasil menambah kategori postingan baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCategory $postCategory)
    {
        if($request->name != $postCategory->name)
        {
            $validated = $request->validate([
                'name' => 'required|min:3|max:50|unique:post_categories'
            ]);

            $validated['slug'] = str::of($request->name)->slug('-');

            PostCategory::where('id',$postCategory->id)
                        ->update($validated);

            return redirect('/dashboard/post-categories')->with('success', 'Berhasil mengubah nama kategori!');
        }
        return redirect('/dashboard/post-categories')->with('info', 'Nama kategori tidak diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($postCategory)
    {
        $postsCount = Post::where('category_id', $postCategory)->count();

        if($postsCount)
        {
            return redirect('/dashboard/post-categories')->with('info', 'Gagal menghapus kategori postingan!');
        }
        else
        {
            Postcategory::destroy($postCategory);
            
            return redirect('/dashboard/post-categories')->with('success', 'Berhasil menghapus kategori postingan!');
        }
    }
}
