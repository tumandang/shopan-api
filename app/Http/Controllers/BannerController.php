<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary as CloudinaryAPI;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('pages.bannermanage.banner', compact('banners'));
    }

    public function storebanner(Request $request)
    {
        $request->validate(['banner_image' => 'required|image|max:5120']);

        if ($request->hasFile('banner_image')) {
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
                    $request->file('banner_image')->getRealPath(),
                    ['folder' => 'banners']
                );

                $position = Banner::max('position') ? Banner::max('position') + 1 : 1;

                Banner::create([
                    'image' => $result['secure_url'], 
                    'position' => $position
                ]);

                return back()->with('success', 'Banner uploaded successfully!');
            } catch (\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => $e->getTraceAsString()
                ], 500);
            }
        } else {
            return back()->with('fail', 'No banner file selected.');
        }
    }

    public function deletebanner($banner_id)
    {
        $data = Banner::find($banner_id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('banner.index');
    }

    public function getImage($id)
    {
        $image = Banner::find($id);
        return response()->json([
            'url' => $image->image,
            'position' => $image->position,
        ]);
    }

    public function getAllBanners()
    {
        $banners = Banner::orderBy('position', 'asc')->get()->map(function ($banner) {
            return [
                'url' => $banner->image, // Already a full Cloudinary URL
                'position' => $banner->position,
            ];
        });

        return response()->json($banners);
    }
}