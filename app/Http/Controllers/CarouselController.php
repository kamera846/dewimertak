<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        return view('dashboard.carousel', [
            'subPart' => true,
            'carouselPage' => true,
            'profile' => Profile::get()[0],
            'carousels' => Carousel::all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.carousel-create', [
            'subPart' => true,
            'carouselPage' => true,
            'profile' => Profile::get()[0]
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|file|image',
            'text' => 'required|max:255'
        ]);

        $validated['image'] = $request->file('image')->store('/');

        Carousel::create($validated);

        return redirect('/dashboard/carousels')->with('success', 'Berhasil menambahkan tayangan baru!');
    }

    public function edit(Carousel $carousel)
    {
        return view('dashboard.carousel-edit', [
            'subPart' => true,
            'carouselPage' => true,
            'profile' => Profile::get()[0],
            'carousel' => $carousel
        ]);
    }

    public function update(Request $request, Carousel $carousel)
    {
        $validated = $request->validate([
            'image' => 'file|image',
            'text' => 'required|max:255'
        ]);

        if($request->file('image'))
        {
            $validated['image'] = $request->file('image')->store('/');
            Storage::delete($carousel->image);
        }
        
        Carousel::where('id', $carousel->id)
                ->update($validated);

        return redirect('/dashboard/carousels')->with('success', 'Berhasil memperbarui data tayangan!');
    }

    public function destroy(Carousel $carousel)
    {
        Storage::delete($carousel->image);

        Carousel::destroy($carousel->id);

        return redirect('/dashboard/carousels')->with('success', 'Berhasil menghapus tayangan!');
    }
}
