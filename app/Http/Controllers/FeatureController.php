<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    public function index()
    {
        return view('dashboard.feature', [
            'subPart' => true,
            'featurePage' => true,
            'profile' => Profile::get()[0],
            'features' => Feature::all(),
        ]);
    }

    public function create()
    {
        if(Feature::count() < 4){
            return view('dashboard.feature-create', [
                'subPart' => true,
                'featurePage' => true,
                'profile' => Profile::get()[0]
            ]);
        } else {
            return redirect('/dashboard/features');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'image' => 'file|image|max:1024',
            'content' => 'required|max:500'
        ]);

        if($request->file('image')) {
            $validated['image'] = $request->file('image')->store('/');
        }

        Feature::create($validated);

        return redirect('/dashboard/features')->with('success', 'Berhasil menambahkan layanan/produk!');
    }

    public function edit(Feature $feature)
    {
        return view('dashboard.feature-edit', [
            'subPart' => true,
            'featurePage' => true,
            'profile' => Profile::get()[0],
            'feature' => $feature
        ]);
    }

    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'image' => 'file|image|max:1024',
            'content' => 'required|max:500'
        ]);

        if($request->file('image'))
        {
            $validated['image'] = $request->file('image')->store('/');
            if($feature->image) {
                Storage::delete($feature->image);
            }
        }
        
        Feature::where('id', $feature->id)
                ->update($validated);

        return redirect('/dashboard/features')->with('success', 'Berhasil memperbarui data layanan/produk!');
    }

    public function destroy(Feature $feature)
    {
        if($feature->image) {
            Storage::delete($feature->image);
        }

        Feature::destroy($feature->id);

        return redirect('/dashboard/features')->with('success', 'Berhasil menghapus layanan/produk!');
    }
}
