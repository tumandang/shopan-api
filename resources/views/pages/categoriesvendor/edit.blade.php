@extends('layout.adminlayout')
@section('title', 'Marketplace Management')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="mb-8">
        <div class="flex items-center mb-4">
            <a href="{{ route('categories.index') }}" 
               class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors duration-200 mr-4">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back
            </a>
        </div>
        <h1 class="text-3xl font-bold text-gray-900">Edit Category</h1>
        <p class="mt-2 text-sm text-gray-600">Update category information</p>
    </div>

    <div class="max-w-2xl">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <form action="{{ route('categories.update', $category->id) }}" method="POST" class="p-6 sm:p-8">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                 
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Category Name
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="name" 
                               id="name"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('name') border-red-500 @enderror" 
                               placeholder="Enter category name"
                               value="{{ old('name', $category->name) }}"
                               required>
                        @error('name')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1.5 text-xs text-gray-500">This will be displayed to users</p>
                    </div>

               
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                            Slug
                            <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   name="slug" 
                                   id="slug"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('slug') border-red-500 @enderror" 
                                   placeholder="category-slug"
                                   value="{{ old('slug', $category->slug) }}"
                                   required>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                </svg>
                            </div>
                        </div>
                        @error('slug')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1.5 text-xs text-gray-500">URL-friendly version (lowercase, hyphens only)</p>
                    </div>

             
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <h3 class="text-sm font-medium text-gray-700 mb-3">Category Information</h3>
                        <dl class="grid grid-cols-1 gap-3 text-sm">
                            <div class="flex justify-between">
                                <dt class="text-gray-500">Category ID:</dt>
                                <dd class="text-gray-900 font-medium">{{ $category->id }}</dd>
                            </div>
                            @if($category->created_at)
                            <div class="flex justify-between">
                                <dt class="text-gray-500">Created:</dt>
                                <dd class="text-gray-900">{{ $category->created_at->format('M d, Y') }}</dd>
                            </div>
                            @endif
                            @if($category->updated_at)
                            <div class="flex justify-between">
                                <dt class="text-gray-500">Last Updated:</dt>
                                <dd class="text-gray-900">{{ $category->updated_at->format('M d, Y') }}</dd>
                            </div>
                            @endif
                        </dl>
                    </div>
                </div>

         
                <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
                    <button type="button" 
                            onclick="if(confirm('Are you sure you want to delete this category? This action cannot be undone.')) { document.getElementById('delete-form').submit(); }"
                            class="inline-flex items-center px-4 py-2.5 border border-red-300 text-red-700 font-medium rounded-lg hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Delete
                    </button>

                    <div class="flex items-center space-x-3">
                        <a href="{{ route('categories.index') }}" 
                           class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Update Category
                        </button>
                    </div>
                </div>
            </form>

         
            <form id="delete-form" 
                  action="{{ route('categories.destroy', $category->id) }}" 
                  method="POST" 
                  class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>

       
        <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-yellow-800">Important Notes</h3>
                    <div class="mt-2 text-sm text-yellow-700">
                        <ul class="list-disc list-inside space-y-1">
                            <li>Changing the slug may break existing links to this category</li>
                            <li>Make sure to update any references if you change the slug</li>
                            <li>Deleting this category will affect all associated marketplace</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Optional: Auto-generate slug from name (disabled by default for edit form)
    // Uncomment if you want auto-slug generation on edit
    /*
    document.getElementById('name').addEventListener('input', function(e) {
        const slug = e.target.value
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('slug').value = slug;
    });
    */
</script>
@endsection