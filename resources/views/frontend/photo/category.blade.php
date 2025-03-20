@extends('frontend.bn.app')

@section('title', cache('bnSiteSettings')->title)

@section('mainContent')

    <div class="news_container">
        <nav class="print:hidden pt-4">
            <ol class="flex items-center gap-1 text-sm text-gray-600 border-b border-custom-bc dark:border-gray-500 w-fit">
                <li>
                    <a href="{{ url('/photos') }}" class="block transition hover:text-gray-700 dark:text-gray-200 dark:hover:text-gray-300 text-base">ফটো গ্যালারি </a>
                </li>
            </ol>
        </nav>
        <div class="flex flex-col gap-4">
            <div class="border-b border-b-[#dee2e6] dark:border-gray-500 mt-4">
                <a href="{{ url('/photos/' . $category->cat_slug) }}" class=" dark:text-slate-200 font-semibold">
                    <h1 class="text-xl md:text-2xl">{{ $category->cat_name_bn }}</h1>
                </a>
            </div>
            <div class="grid grid-cols-12 gap-4">
                @foreach($categoryAlbums as $album)
                    @php($albumURL = fAlbumURL($album->album_id, $album->category->cat_slug))
                    <a href="{{ $albumURL }}" class="col-span-12 md:col-span-3 mb-6 bg-[#efefef] dark:bg-[#26334d] dark:text-slate-300">
                        <div class="lead-post group overflow-hidden">
                            <div class="relative">
                                <img src="{{ !empty($album->feature_image['img']) ? asset(config('appconfig.photoAlbumImagePath').$album->feature_image['img']) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)  }}" alt="{{ $album->album_name }}" class="mx-auto w-full group-hover:scale-110 duration-300">
                            </div>
                        </div>
                        <div class="image-caption px-4 py-4">
                            <h4 class="text-xl">{{ $album->album_name }}</h4>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection


