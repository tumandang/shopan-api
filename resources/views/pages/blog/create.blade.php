@extends('layout.adminlayout')
@section('title', 'Create Blog Post')
@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <x-breadcrumb :items="[
            ['label' => 'Announcement', 'url' => route('blog.index')],
            ['label' => 'Create New Announcement', 'url' => '#'],
        ]" />
        <div class="bg-white rounded-lg shadow-md p-6">

            <div class="border-b pb-4 mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Create New Blog Post</h1>
                <p class="text-gray-600 mt-1">Fill in the details to create a new blog post</p>
            </div>

            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent @error('title') border-red-500 @enderror"
                        placeholder="Enter blog post title" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">
                        Excerpt
                    </label>
                    <textarea name="summary" id="summary" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent @error('excerpt') border-red-500 @enderror"
                        placeholder="Brief summary of the blog post">{{ old('excerpt') }}</textarea>
                    @error('summary')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                        Content <span class="text-red-500">*</span>
                    </label>
                    <textarea name="description" id="description" rows="12"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent @error('content') border-red-500 @enderror"
                        placeholder="Write your blog post content here..." required>{{ old('content') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">
                        Featured Image
                    </label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent @error('featured_image') border-red-500 @enderror">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Supported formats: JPG, PNG, GIF (Max: 2MB)</p>
                </div>

                <div class="mb-6">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select name="status" id="status"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent @error('status') border-red-500 @enderror"required>
                        <option value="Draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="Published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="Pending" {{ old('status') === 'pending' ? 'selected' : '' }}>Pending Review</option>
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
                        Create Post
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
