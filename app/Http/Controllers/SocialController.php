<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Social;
Use App\Models\Profile;

class SocialController extends Controller
{

    public function index()
    {
        return view('dashboard.social', [
            'profile' => Profile::get()[0],
            'socials' => Social::latest()->get(),
            'socialPage' => true,
            'options' => ['facebook', 'instagram', 'twitter', 'youtube', 'pinterest']
        ]);
    }

    public function create()
    {
        if(Social::count() < 5) {
            return view('dashboard.social-create', [
                'profile' => Profile::get()[0],
                'socialPage' => true,
                'socials' => Social::all(),
                'options' => ['facebook', 'instagram', 'twitter', 'youtube', 'pinterest']
            ]);
        } else {
            return redirect('/dashboard/socials');
        }

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'app' => 'required',
            'link' => 'required|max:255'
        ]);

        Social::create($validated);

        return redirect('/dashboard/socials')->with('success', 'Berhasil menambahkan jejaring sosial!');
    }

    public function edit(Social $social)
    {
        return view('dashboard.social-edit', [
            'profile' => Profile::get()[0],
            'socialPage' => true,
            'socials' => Social::all(),
            'options' => ['facebook', 'instagram', 'twitter', 'pinterest', 'youtube'],
            'social' => $social
        ]);
    }

    public function update(Request $request, Social $social)
    {
        
        $validated = $request->validate([
            'app' => 'required',
            'link' => 'required|max:255'
        ]);

        Social::where('id', $social->id)
                ->update($validated);

        return redirect('/dashboard/socials')->with('success', 'Berhasil memperbarui jejaring sosial!');
    }
    
    public function destroy(Social $social)
    {
        Social::destroy($social->id);
        return redirect('/dashboard/socials')->with('success', 'Berhasil menghapus jejaring sosial!');
    }
}

