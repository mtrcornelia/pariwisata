<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Gallery;
use App\Models\Facility;
use App\Models\Category;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.tour.index', [
            'tours' => Tour::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.tour.create', [
            'tours' => Tour::all(),
            'categories' => Category::all(),
            'facilities' => Facility::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tour_name' => 'required',
            'category_id' => 'required',
            'address' => 'required',
            'location' => 'nullable',
            'cover' => 'required',
            'created_date' => 'required',
            'description' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facilities' => 'array|required'
        ]);

        if ($request->hasFile('cover')) {
            $namaFile = 'img_' . time() . '_' . $request->cover->getClientOriginalName();
            $request->cover->move('images', $namaFile);
        } else {
            $namaFile = '';
        }
        $validateData['cover'] = $namaFile;

        // Buat tour baru
        $tour = Tour::create([
            'tour_name' => $validateData['tour_name'],
            'category_id' => $validateData['category_id'],
            'address' => $validateData['address'],
            'location' => $validateData['location'],
            'cover' => $validateData['cover'],
            'created_date' => $validateData['created_date'],
            'description' => $validateData['description'],
            'created_by' => $validateData['created_by'] = auth()->user()->id
        ]);

        // menyimpan falitas
        $tour->facilities()->sync($request->facilities);


        // Menyimpan gambar ke galeri tour
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageFileName = 'tour_' . time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/tours'), $imageFileName);

                // Simpan ke galeri tour
                Gallery::create([
                    'tour_id' => $tour->id,
                    'image_path' => 'tours/' . $imageFileName, // Menyimpan hanya path relatif
                ]);
            }
        }

        return redirect('/tour')->with('pesan', 'data berhasil di tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tour = Tour::with(['gallery'])->findOrFail($id);
        $categories = Category::all();
        $facilities = Facility::all();
        $tourFacilities = $tour->facilities->pluck('id')->toArray();
        return view('backend.tour.edit', compact('tour', 'categories', 'facilities', 'tourFacilities'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'tour_name' => 'required',
            'category_id' => 'required',
            'address' => 'required',
            'location' => 'nullable',
            'cover' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            'created_date' => 'required|date',
            'description' => 'required',
            'facilities' => 'nullable|array',
            'gallery_delete' => 'nullable|array',
            'images.*' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ]);

        $tour = Tour::find($id);

        if ($request->hasFile('cover')) {
            // Menghapus file lama jika ada file baru yang diunggah
            if ($tour->cover) {
                unlink(public_path('images/') . $tour->cover);
            }

            $namaFile = 'img_' . time() . '_' . $request->cover->getClientOriginalName();
            $request->cover->move('images/', $namaFile);
            $tour->cover = $namaFile;
        }

        // Perbarui detail tour
        $tour->tour_name = $validateData['tour_name'];
        $tour->category_id = $validateData['category_id'];
        $tour->address = $validateData['address'];
        $tour->location = $validateData['location'] ?? $tour->location;
        $tour->created_date = $validateData['created_date'];
        $tour->description = $validateData['description'];
        $tour->save();

        // Perbarui fasilitas
        $tour->facilities()->sync($request->input('facilities', []));

        // Kelola galeri gambar
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = 'gallery_' . time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/tours'), $imageName);



                // Simpan ke galeri tour
                Gallery::create([
                    'tour_id' => $tour->id,
                    'image_path' => 'tours/' . $imageName, // Menyimpan hanya path relatif
                ]);
            }
        }

        // print_r($validateData['gallery_delete']);
        if (isset($validateData['gallery_delete'])) {
            foreach ($validateData['gallery_delete'] as $idimage) {
                // Gallery::destroy($idimage);
                $dt = Gallery::findOrFail($idimage);
                // print_r($dt->image_path);
                unlink(public_path('images/') . $dt->image_path);
                $dt->delete();
                // echo $idimage;
            }
        }
        return redirect('/tour')->with('pesan', 'Tour berhasil diubah');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        $tour->delete(); // Menghapus objek Tour
        return redirect('/tour')->with('pesan', 'Data berhasil dihapus');
    }
}