<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantAdminController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::latest()->get();
        return view('admin.restaurant.index', compact('restaurants'));
    }

    public function create()
    {
        return view('admin.restaurant.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'region'      => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image',
        ]);

        // ================= IMAGE PROCESS =================
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            
            // Generate unique filename
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Store image directly without processing
            // This works on any server without needing GD/ImageMagick
            $path = $file->storeAs('restaurants', $fileName, 'public');
            
            $data['image'] = $path;
        }

        // default rating
        $data['rating'] = 0;

        Restaurant::create($data);

        return redirect('/admin/restaurants')
            ->with('success', 'Restoran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('admin.restaurant.edit', compact('restaurant'));
    }

    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'region'      => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {

            // delete old image
            if ($restaurant->image) {
                Storage::disk('public')->delete($restaurant->image);
            }

            $file = $request->file('image');
            
            // Generate unique filename
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Store image directly without processing
            $path = $file->storeAs('restaurants', $fileName, 'public');
            
            $data['image'] = $path;
        }

        $restaurant->update($data);

        return redirect('/admin/restaurants')
            ->with('success', 'Restoran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        if ($restaurant->image) {
            Storage::disk('public')->delete($restaurant->image);
        }

        $restaurant->delete();

        return back()->with('success', 'Restoran berhasil dihapus');
    }
}
