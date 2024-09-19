<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Tour;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $tours = Tour::all(); 
        $events = Event::all();
        return view('frontend.index', compact('categories', 'tours','events'));
    }
    public function showTourAll()
    {
        $categories = Category::all();
        $tours = Tour::all(); 
        $events = Event::all();
        return view('frontend.tour.index', compact('categories', 'tours','events'));
    }

    public function showByCategory($id)
    {
        $category = Category::findOrFail($id);
        $tours = Tour::where('category_id', $id)->get();
        $categories = Category::all();
        return view('frontend.tour.index', compact('category', 'tours', 'categories'));
    }

    public function show($id)
    {
        $tour = Tour::findOrFail($id);
        $events = Event::all();
        return view('frontend.tour.index', compact('tour'));
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
