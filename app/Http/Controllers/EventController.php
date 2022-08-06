<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        return view('dashboard.event', [
            'subPart' => true,
            'eventPage' => true,
            'profile' => Profile::get()[0],
            'events' => Event::all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.event-create', [
            'subPart' => true,
            'eventPage' => true,
            'profile' => Profile::get()[0]
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|file|image|max:1024',
            'title' => 'required|max:100'
        ]);

        $validated['image'] = $request->file('image')->store('/');

        Event::create($validated);

        return redirect('/dashboard/events')->with('success', 'Berhasil menambahkan acara/kegiatan baru!');
    }

    public function edit(Event $event)
    {
        return view('dashboard.event-edit', [
            'subPart' => true,
            'eventPage' => true,
            'profile' => Profile::get()[0],
            'event' => $event
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'image' => 'file|image|max:1024',
            'title' => 'required|max:100'
        ]);

        if($request->file('image'))
        {
            $validated['image'] = $request->file('image')->store('/');
            Storage::delete($event->image);
        }
        
        Event::where('id', $event->id)
                ->update($validated);

        return redirect('/dashboard/events')->with('success', 'Berhasil memperbarui data acara/kegiatan!');
    }

    public function destroy(Event $event)
    {
        Storage::delete($event->image);

        Event::destroy($event->id);

        return redirect('/dashboard/events')->with('success', 'Berhasil menghapus acara/kegiatan!');
    }
}
