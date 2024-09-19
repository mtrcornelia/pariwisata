<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.event.index',[
            'events' => Event::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.event.create',[
            'events' => Event::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_time' => 'required',
            'location' => 'nullable',
            'address' => 'required',
            'file' => 'required|file|mimes:jpg,png,jpeg|max:2048',
            
        ]);

        if ($request->hasFile('file')) {
            $namaFile='img_'.time().'_'.$request->file->getClientOriginalName();
            $request->file->move('images',$namaFile);
        }
        else {
            $namaFile='';
        }
        $validateData['file']=$namaFile;
        
        Event::create($validateData);
        return redirect('/event')->with('pesan','data berhasil di tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('backend.event.edit',[
            'events' => Event::find($id)
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_time' => 'required',
            'location' => 'nullable',
            'address' => 'required',
            'file' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        $item = Event::find($id);
    
        
        if ($request->hasFile('file')) {
            // Menghapus file lama jika ada file baru yang diunggah
            if ($item->file) {
                unlink(public_path('images/') . $item->file);
            }
    
            

            $namaFile='img_'.time().'_'.$request->file->getClientOriginalName();
            $request->file->move('images',$namaFile);
            $item->file = $namaFile;

    
        }
    
        $item->title = $validateData['title'];
        $item->description = $validateData['description'];
        $item->event_time = $validateData['event_time'];
        $item->location = $validateData['location'];
        $item->address = $validateData['address'];
        $item->save();
    
        return redirect('/event')->with('success', 'File has been updated successfully');;
        // return redirect()->back()->with('success', 'File has been updated successfully');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Event::destroy($id);
        return redirect('/event')->with('pesan','data berhasil dihapus');
    }
}
