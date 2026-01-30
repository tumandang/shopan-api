@extends('layout.adminlayout')

@section('title', 'Banner')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <x-breadcrumb :items="[ ['label' => 'Banner', 'url' => route('banner.index')] ]" />
        <div class=" p-6 shadow-sm h-screen">
        
            @if (session('success'))
                <div class="mb-4 rounded-lg bg-green-100 p-4 text-green-800">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('fail'))
                <div class="mb-4 rounded-lg bg-red-100 p-4 text-red-800">
                    {{ session('fail') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-4 rounded-lg bg-red-100 p-4 text-red-800">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <form id="bannerform" method="POST" action="{{ route('banner.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="add-banner"
                        class="group relative flex min-h-[200px] cursor-pointer flex-col items-center justify-center gap-3 overflow-hidden rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 p-6 text-white shadow-lg transition-all hover:shadow-xl hover:-translate-y-1">
                        <div id="upload-icon"
                            class="rounded-full bg-white/20 p-3 backdrop-blur-sm transition-transform group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="h-8 w-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <span id="upload-text" class="text-lg font-semibold">Add New Banner</span>
                        <span class="text-xs opacity-90">Click to upload image</span>
                        <input type="file" id="add-banner" name="banner_image" accept="image/*" class="hidden"
                            onchange="handleUpload(this)">
                    </label>
                </form>
                @foreach ($banners as $banner)
                    <div class="group relative flex min-h-[200px] flex-col items-center justify-center gap-3 overflow-hidden rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 p-6 transition-all hover:border-blue-400 hover:bg-blue-50/50">
                        <img src="{{ $banner->image }}" alt="Banner {{ $loop->iteration }}"
                            class="h-32 w-full object-cover rounded-xl">
                        <p class="text-sm font-medium text-slate-700">Banner {{ $banner->position }}</p>
                        <div class="absolute right-2 top-2 flex gap-2 opacity-0 transition-opacity group-hover:opacity-100">
                            <form action="{{ route('banner.delete',$banner->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-lg bg-white p-2 shadow-md transition-colors hover:bg-red-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function handleUpload(input) {
            if (input.files && input.files[0]) {
                document.getElementById('upload-text').textContent = 'Uploading...';
                document.getElementById('upload-icon').innerHTML = `
            <svg class="animate-spin h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        `;
                document.getElementById('bannerform').submit();
            }
        }
    </script>

@endsection