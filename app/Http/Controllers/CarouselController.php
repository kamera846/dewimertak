<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
        if(Carousel::count() < 3) {
            return view('dashboard.carousel-create', [
                'subPart' => true,
                'carouselPage' => true,
                'profile' => Profile::get()[0]
            ]);
        } else {
            return redirect('/dashboard/carousels');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|file|image',
            'title' => 'required|max:100',
            'sub_title' => 'max:255'
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
            'title' => 'required|max:100',
            'sub_title' => 'max:255'
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
