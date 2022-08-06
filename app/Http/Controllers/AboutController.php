<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function show()
    {
        return view('dashboard.about', [
            'profile' => Profile::get()[0],
            'subPart' => true,
            'aboutPage' => true,
            'about' => About::get()[0]
        ]);
    }

    public function edit()
    {
        return view('dashboard.about-edit', [
            'profile' => Profile::get()[0],
            'subPart' => true,
            'aboutPage' => true,
            'about' => About::get()[0]
        ]);
    }

    public function update(Request $request, About $about)
    {
        $validated = $request->validate([
            'title' => 'required|min:5|max:100',
            'image' => 'file|image|max:2048',
            'content' => 'required|min:50',
        ]);

        if($request->file('image')) {
            $validated['image'] = $request->file('image')->store('/');
            if($about->image) {
                Storage::delete($about->image);
            }
        }

        About::where('id', 1)
                ->update($validated);

        return redirect('/dashboard/about')->with('success', 'Berhasil memperbarui data tentang desa!');
    }
}