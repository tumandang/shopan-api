@extends('layout.adminlayout')
@section('title', 'Marketplace Management')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <x-breadcrumb :items="[
            ['label' => 'Marketplace', 'url' => route('marketplaces.index')],
            ['label' => 'Create New Marketplace', 'url' => '#'],
        ]" />

        <div class="max-w-full">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <form action="{{ route('marketplaces.store') }}" method="POST" enctype="multipart/form-data"
                    class="p-6 sm:p-8">
                    @csrf

                    <div class="space-y-6">

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Marketplace Name
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('name') border-red-500 @enderror"
                                placeholder="Enter marketplace name" value="{{ old('name') }}" required>
                            @error('name')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="flex gap-x-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Logo
                                </label>
                                <span class="text-red-500">*</span>
                            </div>
                            <div class="flex items-start space-x-4">

                                <div id="logo-preview" class="flex-shrink-0 hidden">
                                    <img id="preview-image" src="" alt="Logo preview"
                                        class="w-24 h-24 object-contain rounded-lg border-2 border-gray-200 bg-gray-50 p-2">
                                </div>

                                <div class="flex-1">
                                    <div class="relative">
                                        <input type="file" name="logo" id="logo" accept="image/*" class="hidden"
                                            onchange="previewLogo(event)" required>
                                        <label for="logo"
                                            class="flex flex-col items-center px-6 py-8 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-colors duration-200">
                                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="mt-2 text-sm font-medium text-gray-600">
                                                <span class="text-orange-600 hover:text-orange-700">Click to upload</span>
                                                or
                                                drag and drop
                                            </span>
                                            <span class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 2MB</span>
                                        </label>
                                    </div>
                                    <div id="file-name" class="mt-2 text-sm text-gray-600 hidden"></div>
                                    @error('logo')
                                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Description
                            </label>
                            <textarea name="description" id="description" rows="4"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 resize-none @error('description') border-red-500 @enderror"
                                placeholder="Enter marketplace description">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1.5 text-xs text-gray-500">Provide a brief description of the marketplace</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Marketplace Link <span class="text-red-500">*</span>
                            </label>
                            <input type="url" name="link_marketplace"
                                value="{{ old('link_marketplace', $marketplace->link_marketplace ?? '') }}"
                                placeholder="https://www.amazon.co.jp" required
                                class="w-full px-4 py-2.5 border rounded-lg">
                        </div>


                        <div>
                            <label for="categories" class="block text-sm font-medium text-gray-700 mb-2">
                                Categories
                            </label>
                            <div class="relative">
                                <select name="categories[]" id="categories" multiple size="6"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('categories') border-red-500 @enderror">
                                    @foreach ($categories as $c)
                                        <option value="{{ $c->id }}"
                                            {{ is_array(old('categories')) && in_array($c->id, old('categories')) ? 'selected' : '' }}
                                            class="py-2 px-2 hover:bg-blue-50">
                                            {{ $c->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                            </div>
                            @error('categories')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror


                            @if ($categories->count() === 0)
                                <div class="mt-3 bg-yellow-50 border border-yellow-200 rounded-lg p-3">
                                    <div class="flex">
                                        <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                        <div class="text-sm text-yellow-700">
                                            No categories available.
                                            <a href="{{ route('categories.create') }}"
                                                class="font-medium underline hover:text-yellow-800">
                                                Create a category first
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-3 mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('marketplaces.index') }}"
                            class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-6 py-2.5 bg-orange-600 hover:bg-orange-700 text-white font-medium rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Create Marketplace
                        </button>
                    </div>
                </form>
                @if (session('error'))
                    <div class="text-red-600 mb-4">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800">Tips for creating marketplaces</h3>
                        <div class="mt-2 text-sm text-blue-700">
                            <ul class="list-disc list-inside space-y-1">
                                <li>Use a clear, high-quality logo for better recognition</li>
                                <li>Write a concise description that highlights key features</li>
                                <li>Select relevant categories to help users find your marketplace</li>
                                <li>Recommended logo size: 512x512 pixels or larger</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewLogo(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('logo-preview');
                    const previewImage = document.getElementById('preview-image');
                    const fileName = document.getElementById('file-name');

                    previewImage.src = e.target.result;
                    preview.classList.remove('hidden');
                    fileName.textContent = `Selected: ${file.name}`;
                    fileName.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        }

        // Optional: Drag and drop functionality
        const logoInput = document.getElementById('logo');
        const uploadArea = logoInput.nextElementSibling;

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            uploadArea.classList.add('border-blue-500', 'bg-blue-50');
        }

        function unhighlight(e) {
            uploadArea.classList.remove('border-blue-500', 'bg-blue-50');
        }

        uploadArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            logoInput.files = files;

            // Trigger change event to show preview
            const event = new Event('change');
            logoInput.dispatchEvent(event);
        }
    </script>
@endsection
