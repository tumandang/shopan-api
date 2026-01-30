@extends('layout.adminlayout')
@section('title', 'Edit Blog Post')
@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <x-breadcrumb :items="[
                ['label' => 'Announcement', 'url' => route('blog.index')],
                ['label' => 'Edit an Announcement', 'url' => '#'],
            ]" />
            <div class="border-b pb-4 mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Edit Blog Post</h1>
                <p class="text-gray-600 mt-1">Update the details of your blog post</p>
            </div>

            <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent @error('title') border-red-500 @enderror"
                        placeholder="Enter blog post title" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="summary" class="block text-sm font-medium text-gray-700 mb-2">
                        Excerpt
                    </label>
                    <textarea name="summary" id="summary" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent @error('summary') border-red-500 @enderror"
                        placeholder="Brief summary of the blog post">{{ old('summary', $blog->summary) }}</textarea>
                    @error('summary')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Content <span class="text-red-500">*</span>
                    </label>
                    <textarea name="description" id="description" rows="12"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent @error('description') border-red-500 @enderror"
                        placeholder="Write your blog post content here..." required>{{ old('description', $blog->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                        Featured Image
                    </label>

                    @if ($blog->image)
                        <div class="mb-3">
                            <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                            <img src="{{ $blog->image }}" alt="Current featured image"
                                class="w-48 h-32 object-cover rounded-lg border border-gray-200">
                        </div>
                    @endif

                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent @error('image') border-red-500 @enderror">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Supported formats: JPG, PNG, GIF (Max: 2MB) - Leave empty to keep
                        current image</p>
                </div>

                <div class="mb-6">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select name="status" id="status"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent @error('status') border-red-500 @enderror"
                        required>
                        <option value="Draft" {{ old('status', $blog->status) === 'Draft' ? 'selected' : '' }}>Draft
                        </option>
                        <option value="Published" {{ old('status', $blog->status) === 'Published' ? 'selected' : '' }}>
                            Published</option>
                        <option value="Pending" {{ old('status', $blog->status) === 'Pending' ? 'selected' : '' }}>Pending
                            Review</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex items-center justify-end space-x-3 pt-6 border-t">
                    <a href="{{ route('blog.index') }}"
                        class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-orange-600 hover:bg-orange-700 text-white rounded-lg transition-colors duration-200">
                        Update Post
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
