<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Section;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SectionController extends Controller
{
    public function index()
    {
        return view('dashboard.section', [
            'profile' => Profile::get()[0],
            'sectionPage' => true,
            'homeSections' => Section::where('on_page', 'Beranda')->get(),
            'aboutSections' => Section::where('on_page', 'Tentang')->get(),
            'postSections' => Section::where('on_page', 'Artikel')->get(),
            'gallerySections' => Section::where('on_page', 'Galeri')->get(),
            'contactSections' => Section::where('on_page', 'Kontak')->get(),
        ]);
    }
    
    public function edit(Section $section)
    {
        return view('dashboard.section-edit', [
            'profile' => Profile::get()[0],
            'sectionPage' => true,
            'section' => $section
        ]);
    }

    public function update(Request $request, Section $section)
    {
        $validated = $request->validate([
            'code' => 'required',
            'on_page' => 'required',
            'title' => 'max:150',
            'image' => 'file|image'
        ]);

        if($request->file('image')){
            $validated['image'] = $request->file('image')->store('/');
            if($section->image){
                Storage::delete($section->image);
            }
        }

        Section::where('id', $section->id)
                ->update($validated);

        return redirect('/dashboard/sections')->with('success', 'Berhasil memperbarui data seksi!');
    }
}
