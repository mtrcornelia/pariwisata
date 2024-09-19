<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Facility;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourFrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.tour.index',[
            'tours' => Tour::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menggunakan eager loading untuk mengambil data fasilitas dan gallery
        $tour = Tour::with(['facilities', 'gallery'])->findOrFail($id);
        $categories = Category::all();
        $events = Event::all();

        return view('frontend.tour.show', compact('tour', 'categories','events'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        //
    }

    public function showByCategory($id)
    {
        $category = Category::findOrFail($id);
        $tours = Tour::where('category_id', $id)->get();
        $categories = Category::all();
        return view('frontend.tour.index', compact('category', 'tours', 'categories'));
    }

    public function likeTour(Request $request, $tourId)
    {
        $tour = Tour::findOrFail($tourId);

        // Cek apakah user sudah like tour ini dengan sesi
        $likedTours = session()->get('liked_tours', []);

        if (in_array($tourId, $likedTours)) {
            // Jika sudah like, kurangi like
            $tour->likes_count--;
            $tour->save();

            // Hapus dari sesi
            $likedTours = array_diff($likedTours, [$tourId]);
            session()->put('liked_tours', $likedTours);
        } else {
            // Jika belum, tambah like
            $tour->likes_count++;
            $tour->save();

            // Tambahkan ke sesi
            session()->push('liked_tours', $tourId);
        }

        return back();
    }
}
