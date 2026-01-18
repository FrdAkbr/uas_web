<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Review;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $search  = $request->search;
        $region  = $request->region;

        $restaurants = Restaurant::query()
            ->when($search, function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('location', 'like', "%$search%");
            })
            ->when($region, function ($q) use ($region) {
                $q->where('region', $region);
            })
            ->orderByDesc('rating')
            ->get();

        $topRestaurants = Restaurant::orderByDesc('rating')
            ->take(5)
            ->get();

        return view('home', compact('restaurants', 'topRestaurants'));
    }

    // ================= DETAIL + CHART =================
    public function show(Restaurant $restaurant)
    {
        // ambil semua review restoran ini
        $reviews = Review::where('restaurant_id', $restaurant->id)->get();
        $totalReviews = $reviews->count();

        // hitung jumlah tiap rating
        $ratingCounts = [
            5 => $reviews->where('rating', 5)->count(),
            4 => $reviews->where('rating', 4)->count(),
            3 => $reviews->where('rating', 3)->count(),
            2 => $reviews->where('rating', 2)->count(),
            1 => $reviews->where('rating', 1)->count(),
        ];

        // rating rata-rata (aman kalau belum ada review)
        $averageRating = $totalReviews
            ? round($reviews->avg('rating'), 1)
            : 0;

        return view('detail', compact(
            'restaurant',
            'averageRating',
            'ratingCounts',
            'totalReviews'
        ));
    }

    // ================= SIMPAN REVIEW (TIDAK DIUBAH) =================
    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $restaurant = Restaurant::findOrFail($id);

        Review::create([
            'restaurant_id' => $restaurant->id,
            'name'          => $request->name,
            'rating'        => $request->rating,
            'comment'       => $request->comment,
        ]);

        // update rating restoran
        $restaurant->rating = Review::where('restaurant_id', $restaurant->id)
            ->avg('rating');

        $restaurant->save();

        return back()->with('success', 'Review berhasil ditambahkan');
    }

    public function semua()
    {
        $restaurants = Restaurant::latest()->get();
        return view('semua', compact('restaurants'));
    }

    // ================= REALTIME SEARCH =================
    public function search(Request $request)
    {
        $restaurants = Restaurant::query()
            ->when($request->search, function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%");
            })
            ->when($request->region, function ($q) use ($request) {
                $q->where('region', $request->region);
            })
            ->get();

        return view('partials.restaurant-list', compact('restaurants'))->render();
    }
}