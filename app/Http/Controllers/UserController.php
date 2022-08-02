<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'super-admin')
        {
            return view('dashboard.user', [
                'profile' => Profile::get()[0],
                'users' => User::latest()->get()->where('role', 'admin'),
                'userPage' => true,
            ]);
        }
        else
        {
            echo "<script>history.go(-1)</script>";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'super-admin')
        {
            return view('dashboard.user-create', [
                'profile' => Profile::get()[0],
                'superAdmin' => User::get()->where('role', 'super-admin'),
                'userPage' => true,
            ]);
        }
        else
        {
            echo "<script>history.go(-1)</script>";
        }
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
            'name' => 'required|unique:users|min:3|max:100',
            'image' => 'file|image|max:1024',
            'role' => 'required',
            'email' => 'required|email:dns|unique:users',
            'telephone' => 'max:15',
            'password' => 'required|min:4|max:255',
            'bio' => 'max:500'
        ]);
        $validated['slug'] = str::of($request->name)->slug('-');
        $validated['password'] = Hash::make($validated['password']);

        if($request->file('image'))
        {
            $validated['image'] = $request->file('image')->store('/');
        }

        User::create($validated);

        return redirect('/dashboard/users')->with('success', 'Berhasil menambahkan pengguna baru!');
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
    public function edit(User $user)
    {
        if(Auth::user()->role == 'super-admin' || Auth::user()->id == $user->id)
        {
            return view('dashboard.user-edit', [
                'profile' => Profile::get()[0],
                'user' => $user,
                'userPage' => true,
            ]);
        }
        else
        {
            echo "<script>history.go(-1)</script>";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'image' => 'file|image|max:1024',
            'telephone' => 'max:15',
            'bio' => 'max:500'
        ];

        if($request->password)
        {
            $rules['password'] = 'required|min:4|max:255';
        }

        if($request->name != $user->name)
        {
            $rules['name'] = 'required|unique:users|min:3|max:100';
        }
        
        if($request->email != $user->email)
        {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $validated = $request->validate($rules);
        
        $validated['slug'] = str::of($request->name)->slug('-');

        if($request->password)
        {
            $validated['password'] = Hash::make($validated['password']);
        }

        if($request->file('image'))
        {
            $validated['image'] = $request->file('image')->store('/');
            if($user->image)
            {
                Storage::delete($user->image);
            }
        }

        User::where('id', $user->id)
                ->update($validated);

        if(Auth::user()->id === $user->id)
        {
            return redirect('/dashboard')->with('success', 'Berhasil memperbarui profil!');
        }
        else
        {
            return redirect('/dashboard/users')->with('success', 'Berhasil memperbarui data pengguna!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        if($user->image)
        {
            Storage::delete($user->image);
        }

        return redirect('/dashboard/users')->with('success', 'Berhasil menghapus pengguna!');
    }
}
