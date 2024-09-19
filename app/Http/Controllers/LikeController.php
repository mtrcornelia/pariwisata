<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class LikeController extends Controller
{
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