<?php

namespace App\Http\Controllers;

use App\Models\Annoucement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Cloudinary\Cloudinary as CloudinaryAPI;

class AnnouncementController extends Controller
{

    public function index()
    {
        $blog = Annoucement::with('user')
            ->latest()
            ->get();

        return view('pages.blog.index', compact('blog'));
    }

 
    public function create()
    {
        return view('pages.blog.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'summary' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|in:Draft,Published,Pending Review',
        ]);

        // Upload to Cloudinary
        if ($request->hasFile('image')) {
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
                    $request->file('image')->getRealPath(),
                    ['folder' => 'blog']
                );
                
                $validated['image'] = $result['secure_url'];
            } catch (\Exception $e) {
                return back()->with('error', 'Image upload failed: ' . $e->getMessage());
            }
        }

        $validated['user_id'] = Auth::id();

        Annoucement::create($validated);

        return redirect()
            ->route('blog.index')
            ->with('success', 'Blog post created successfully!');
    }


    public function show(Annoucement $blog)
    {
        $blog->load('user');
        return view('pages.blog.show', compact('blog'));
    }
    
    public function fetchBlog()
    {
        $allblog = Annoucement::all();

        return response()->json([
            'status' => true,
            'data' => $allblog
        ]);
    }

    public function edit(Annoucement $blog)
    {
        return view('pages.blog.edit', compact('blog'));
    }


    public function update(Request $request, Annoucement $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'slug' => 'nullable|string|max:50|unique:annoucements,slug,' . $blog->id,
            'summary' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|in:Draft,Published,Pending Review',
            'remove_image' => 'nullable|boolean',
        ]);

        // Remove image if requested
        if ($request->has('remove_image') && $blog->image) {
            // Note: With Cloudinary, we could optionally delete the old image from Cloudinary
            // but for now we'll just remove it from database
            $validated['image'] = null;
        }

        // Upload new image to Cloudinary
        if ($request->hasFile('image')) {
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
                    $request->file('image')->getRealPath(),
                    ['folder' => 'blog']
                );
                
                $validated['image'] = $result['secure_url'];
            } catch (\Exception $e) {
                return back()->with('error', 'Image upload failed: ' . $e->getMessage());
            }
        }

        unset($validated['remove_image']);

        $blog->update($validated);

        return redirect()
            ->route('blog.index')
            ->with('success', 'Blog post updated successfully!');
    }


    public function destroy(Annoucement $blog)
    {
        
        $blog->delete();

        return redirect()
            ->route('blog.index')
            ->with('success', 'Blog post deleted successfully!');
    }


    public function publicIndex()
    {
        $posts = Annoucement::where('status', 'Published')
            ->with('user')
            ->latest()
            ->paginate(10);

        return view('blog.public', compact('posts'));
    }


    public function publicShow($slug)
    {
        $post = Annoucement::where('slug', $slug)
            ->where('status', 'Published')
            ->with('user')
            ->firstOrFail();

        return view('blog.single', compact('post'));
    }


    public function toggleStatus(Annoucement $blog)
    {
        $newStatus = $blog->status === 'Published' ? 'Draft' : 'Published';
        $blog->update(['status' => $newStatus]);

        return redirect()
            ->back()
            ->with('success', "Post status changed to {$newStatus}!");
    }
}