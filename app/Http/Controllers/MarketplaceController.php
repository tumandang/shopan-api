<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Marketplace;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary as CloudinaryAPI;

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

    public function edit(Marketplace $marketplace)
    {
        $categories = Category::all();
        return view('pages.marketplace.edit', compact('marketplace', 'categories'));
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
            try {
                $cloudinary = new CloudinaryAPI([
                    'cloud' => [
                        'cloud_name' => config('cloudinary.cloud_name'),
                        'api_key' => config('cloudinary.api_key'),
                        'api_secret' => config('cloudinary.api_secret'),
                    ],
                    'url' => [
                        'secure' => true
                    ]
                ]);

                $result = $cloudinary->uploadApi()->upload(
                    $request->file('logo')->getRealPath(),
                    ['folder' => 'marketplace-logos']
                );
                
                $data['logo'] = $result['secure_url'];
            } catch (\Exception $e) {
                return back()->with('error', 'Logo upload failed: ' . $e->getMessage());
            }
        }

        $marketplace = Marketplace::create($data);

        if ($request->categories) {
            $marketplace->categories()->sync($request->categories);
        }

        return redirect()->route('marketplaces.index')->with('success', 'Marketplace added successfully!');
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
            try {
                $cloudinary = new CloudinaryAPI([
                    'cloud' => [
                        'cloud_name' => config('cloudinary.cloud_name'),
                        'api_key' => config('cloudinary.api_key'),
                        'api_secret' => config('cloudinary.api_secret'),
                    ],
                    'url' => [
                        'secure' => true
                    ]
                ]);

                $result = $cloudinary->uploadApi()->upload(
                    $request->file('logo')->getRealPath(),
                    ['folder' => 'marketplace-logos']
                );
                
                $data['logo'] = $result['secure_url'];
            } catch (\Exception $e) {
                return back()->with('error', 'Logo upload failed: ' . $e->getMessage());
            }
        }

        $marketplace->update($data);

        if ($request->categories) {
            $marketplace->categories()->sync($request->categories);
        }

        return redirect()->route('marketplaces.index')->with('success', 'Marketplace updated successfully!');
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