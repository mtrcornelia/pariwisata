<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.facility.index',[
            'facilitys' => Facility::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.facility.create',[
            'facilitys' => Facility::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validateData = $request->validate([
            'facility_name' => 'required'
       ]);

       Facility::create($validateData);
       return redirect('/facility')->with('pesan', 'data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('backend.facility.edit',[
            'facilitys' => Facility::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'facility_name' => 'required'
       ]);

       Facility::where('id',$id)->update($validateData);
       return redirect('/facility')->with('pesan',' data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Facility::destroy($id);
       return redirect('/facility')->with('pesan','data berhasil di hapus');
    }
}
