<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        return view('dashboard.profile', [
            'profile' => Profile::get()[0],
            'profilePage' => true,
        ]);
    }

    public function edit()
    {
        return view('dashboard.profile-edit', [
            'profile' => Profile::get()[0],
            'profilePage' => true,
        ]);
    }

    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'site_name' => 'required|min:5|max:25',
            'email' => 'required|email:dns',
            'telephone' => 'required|max:15',
            'location' => 'required|max:100',
        ]);

        if($request->file('logo')) {
            $validated['logo'] = $request->file('logo')->store('/');
            if($profile->logo) {
                Storage::delete($profile->logo);
            }
        }

        if($request->file('favicon')) {
            $validated['favicon'] = $request->file('favicon')->store('/');
            if($profile->favicon) {
                Storage::delete($profile->favicon);
            }
        }

        Profile::where('id', 1)
                ->update($validated);

        return redirect('/dashboard/profile')->with('success', 'Berhasil memperbarui profil Desa!');
    }
}