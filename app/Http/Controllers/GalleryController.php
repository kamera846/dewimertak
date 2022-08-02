<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.gallery', [
            'profile' => Profile::get()[0],
            'galleries' => Gallery::latest()->get(),
            'galleryPage' => true,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.gallery-create', [
            'profile' => Profile::get()[0],
            'galleryPage' => true,
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
            'image' => 'required|file|image|max:2048',
            'capture_at' => 'required|date',
            'caption' => 'max:255'
        ]);
        
        $validated['image'] = $request->file('image')->store('/');

        Gallery::create($validated);

        return redirect('/dashboard/galleries')->with('success', 'Berhasil menambah galeri baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('dashboard.gallery-edit', [
            'profile' => Profile::get()[0],
            'gallery' => $gallery,
            'galleryPage' => true,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'image' => 'file|image|max:2048',
            'capture_at' => 'required|date',
            'caption' => 'max:255'
        ]);

        if($request->file('image'))
        {
            $validated['image'] = $request->file('image')->store('/');
            Storage::delete($gallery->image);
        }
        
        Gallery::where('id', $gallery->id)
                ->update($validated);

        return redirect('/dashboard/galleries')->with('success', 'Berhasil memperbarui data galeri!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        Gallery::destroy($gallery->id);

        Storage::delete($gallery->image);

        return redirect('/dashboard/galleries')->with('success', 'Berhasil menghapus galeri!');
    }
}
