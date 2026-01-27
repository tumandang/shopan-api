<?php

namespace App\Http\Controllers;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Category;
use App\Models\Marketplace;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function index()
    {
        $marketplaces = Marketplace::with('categories')->get();
        return view('pages.marketplace.index', compact('marketplaces'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.marketplace.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'link_marketplace' => 'required|url',
            'categories' => 'nullable|array',
        ]);

        $data = $request->only('name', 'description', 'link_marketplace');

        if ($request->hasFile('logo')) {
            // Upload ke Cloudinary
            $data['logo'] = Cloudinary::upload($request->file('logo')->getRealPath(), [
                'folder' => 'marketplace-logos',
                'overwrite' => true,
                'resource_type' => 'image'
            ])->getSecurePath();
        }

        $marketplace = Marketplace::create($data);

        if ($request->categories) {
            $marketplace->categories()->sync($request->categories);
        }

        return redirect()->route('marketplaces.index')->with('success', 'Marketplace added.');
    }

    public function update(Request $request, Marketplace $marketplace)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'link_marketplace' => 'required|url',
            'categories' => 'nullable|array',
        ]);

        $data = $request->only('name', 'description', 'link_marketplace');

        if ($request->hasFile('logo')) {
            // Upload ke Cloudinary
            $data['logo'] = Cloudinary::upload($request->file('logo')->getRealPath(), [
                'folder' => 'marketplace-logos',
                'overwrite' => true,
                'resource_type' => 'image'
            ])->getSecurePath();
        }

        $marketplace->update($data);

        if ($request->categories) {
            $marketplace->categories()->sync($request->categories);
        }

        return redirect()->route('marketplaces.index')->with('success', 'Marketplace updated.');
    }

    public function destroy(Marketplace $marketplace)
    {
        $marketplace->delete();
        return redirect()->route('marketplaces.index')->with('success', 'Marketplace deleted.');
    }

    public function fetchMarketplace()
    {
        $marketplaces = Marketplace::with('categories')->get();

        return response()->json([
            'status' => true,
            'data' => $marketplaces
        ]);
    }
}
