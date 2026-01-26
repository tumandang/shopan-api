@extends('layout.adminlayout')
@section('title', 'Edit Marketplace')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="mb-8">
            <div class="flex items-center mb-4">
                <a href="{{ route('marketplaces.index') }}"
                    class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors duration-200 mr-4">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back
                </a>
            </div>
            <h1 class="text-3xl font-bold text-gray-900">Edit Marketplace</h1>
            <p class="mt-2 text-sm text-gray-600">Update marketplace information</p>
        </div>

        <div class="max-w-full">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <form action="{{ route('marketplaces.update', $marketplace->id) }}" method="POST"
                    enctype="multipart/form-data" class="p-6 sm:p-8">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Marketplace Name
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('name') border-red-500 @enderror"
                                placeholder="Enter marketplace name" value="{{ old('name', $marketplace->name) }}" required>
                            @error('name')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Logo
                            </label>

                            <div class="flex items-start space-x-4">

                                <div id="current-logo" class="flex-shrink-0 {{ $marketplace->logo ? '' : 'hidden' }}">
                                    <div class="relative group">
                                        <img id="current-logo-image"
                                            src="{{ $marketplace->logo ? asset('storage/' . $marketplace->logo) : '' }}"
                                            alt="Current logo"
                                            class="w-24 h-24 object-contain rounded-lg border-2 border-gray-200 bg-gray-50 p-2">
                                        <div
                                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 rounded-lg transition-all duration-200">
                                        </div>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-2 text-center">Current logo</p>
                                </div>

                                <div id="new-logo-preview" class="flex-shrink-0 hidden">
                                    <div class="relative">
                                        <img id="new-preview-image" src="" alt="New logo preview"
                                            class="w-24 h-24 object-contain rounded-lg border-2 border-blue-500 bg-gray-50 p-2">
                                        <button type="button" onclick="clearNewLogo()"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 transition-colors duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="text-xs text-blue-600 mt-2 text-center font-medium">New logo</p>
                                </div>

                                <div class="flex-1">
                                    <div class="relative">
                                        <input type="file" name="logo" id="logo" accept="image/*" class="hidden"
                                            onchange="previewNewLogo(event)">
                                        <label for="logo"
                                            class="flex flex-col items-center px-6 py-8 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-colors duration-200">
                                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="mt-2 text-sm font-medium text-gray-600">
                                                <span class="text-blue-600 hover:text-blue-700">Click to upload</span> a new
                                                logo
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
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Marketplace Link <span class="text-red-500">*</span>
                            </label>
                            <input type="url" name="link_marketplace"
                                value="{{ old('link_marketplace', $marketplace->link_marketplace ?? '') }}"
                                placeholder="https://www.amazon.co.jp" required
                                class="w-full px-4 py-2.5 border rounded-lg">
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Description
                            </label>
                            <textarea name="description" id="description" rows="4"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 resize-none @error('description') border-red-500 @enderror"
                                placeholder="Enter marketplace description">{{ old('description', $marketplace->description) }}</textarea>
                            @error('description')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1.5 text-xs text-gray-500">Provide a brief description of the marketplace</p>
                        </div>


                        <div>
                            <label for="categories" class="block text-sm font-medium text-gray-700 mb-2">
                                Categories
                            </label>
                            <div class="relative">
                                <div class="relative">
                                    <select name="category_id" id="category"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors duration-200 appearance-none @error('category_id') border-red-500 @enderror">
                                        <option value="">Select a category</option>
                                        @foreach ($categories as $c)
                                            <option value="{{ $c->id }}"
                                                {{ old('category_id') == $c->id ? 'selected' : '' }} class="py-2">
                                                {{ $c->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                @error('category_id')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                @enderror


                                <div id="selected-categories" class="mt-3 flex flex-wrap gap-2"></div>
                            </div>


                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <h3 class="text-sm font-medium text-gray-700 mb-3">Marketplace Information</h3>
                                <dl class="grid grid-cols-1 gap-3 text-sm">
                                    <div class="flex justify-between">
                                        <dt class="text-gray-500">Marketplace ID:</dt>
                                        <dd class="text-gray-900 font-medium">{{ $marketplace->id }}</dd>
                                    </div>
                                    @if ($marketplace->created_at)
                                        <div class="flex justify-between">
                                            <dt class="text-gray-500">Created:</dt>
                                            <dd class="text-gray-900">{{ $marketplace->created_at->format('M d, Y') }}
                                            </dd>
                                        </div>
                                    @endif
                                    @if ($marketplace->updated_at)
                                        <div class="flex justify-between">
                                            <dt class="text-gray-500">Last Updated:</dt>
                                            <dd class="text-gray-900">{{ $marketplace->updated_at->format('M d, Y') }}
                                            </dd>
                                        </div>
                                    @endif
                                </dl>
                            </div>
                        </div>


                        <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
                            <button type="button"
                                onclick="if(confirm('Are you sure you want to delete this marketplace? This action cannot be undone.')) { document.getElementById('delete-form').submit(); }"
                                class="inline-flex items-center px-4 py-2.5 border border-red-300 text-red-700 font-medium rounded-lg hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </button>

                            <div class="flex items-center space-x-3">
                                <a href="{{ route('marketplaces.index') }}"
                                    class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                                    Cancel
                                </a>
                                <button type="submit"
                                    class="inline-flex items-center px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Update Marketplace
                                </button>
                            </div>
                        </div>
                </form>


                <form id="delete-form" action="{{ route('marketplaces.destroy', $marketplace->id) }}" method="POST"
                    class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            </div>


            <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">Important Notes</h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <ul class="list-disc list-inside space-y-1">
                                <li>Uploading a new logo will replace the current one</li>
                                <li>Changes to categories will affect marketplace visibility</li>
                                <li>Deleting this marketplace will affect all associated data</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewNewLogo(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const newPreview = document.getElementById('new-logo-preview');
                    const newPreviewImage = document.getElementById('new-preview-image');
                    const fileName = document.getElementById('file-name');

                    newPreviewImage.src = e.target.result;
                    newPreview.classList.remove('hidden');
                    fileName.textContent = `Selected: ${file.name}`;
                    fileName.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        }

        function clearNewLogo() {
            const logoInput = document.getElementById('logo');
            const newPreview = document.getElementById('new-logo-preview');
            const fileName = document.getElementById('file-name');

            logoInput.value = '';
            newPreview.classList.add('hidden');
            fileName.classList.add('hidden');
        }

        const categorySelect = document.getElementById('categories');
        const selectedCategoriesDiv = document.getElementById('selected-categories');

        function updateSelectedCategories() {
            const selected = Array.from(categorySelect.selectedOptions);
            selectedCategoriesDiv.innerHTML = '';

            if (selected.length > 0) {
                selected.forEach(option => {
                    const badge = document.createElement('span');
                    badge.className =
                        'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800';
                    badge.textContent = option.text;
                    selectedCategoriesDiv.appendChild(badge);
                });
            }
        }

        categorySelect.addEventListener('change', updateSelectedCategories);

        updateSelectedCategories();


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

            const event = new Event('change');
            logoInput.dispatchEvent(event);
        }
    </script>
@endsection
