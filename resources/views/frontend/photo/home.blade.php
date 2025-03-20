@extends('frontend.bn.app')

@section('title', cache('bnSiteSettings')->title)

@section('mainContent')

    <div class="news_container">
        <div class="flex flex-col gap-4">

            <!-- Bangladesh Photo -->
            @if(count($bangladeshAlbums) > 0)
                <div class="border-b border-b-[#dee2e6] mt-4 dark:border-gray-600">
                    <a href="{{ url('/photos/bangladesh') }}" class=" dark:text-slate-200 font-semibold">
                        <h1 class="text-xl md:text-2xl">বাংলাদেশ</h1>
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    @foreach($bangladeshAlbums->take(8) as $album)
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
            @endif
            <!-- End Bangladesh Photo -->

            <!-- Entertainment Photo -->
            @if(count($entertainmentAlbums) > 0)
                <div class="border-b border-b-[#dee2e6] pb-2">
                    <a href="{{ url('/photos/entertainment') }}" class=" dark:text-slate-200 font-semibold">
                        <h1 class="text-xl md:text-2xl">বিনোদন</h1>
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    @foreach($entertainmentAlbums->take(8) as $album)
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
            @endif
            <!-- End Entertainment Photo -->

            <!-- Sports Photo -->
            @if(count($sportsAlbums) > 0)
                <div class="border-b border-b-[#dee2e6] pb-2">
                    <a href="{{ url('/photos/sports') }}" class=" dark:text-slate-200 font-semibold">
                        <h1 class="text-xl md:text-2xl">খেলা</h1>
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    @foreach($sportsAlbums->take(8) as $album)
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
            @endif
            <!-- End Sports Photo -->

            <!-- Lifestyle Photo -->
            @if(count($lifestyleAlbums) > 0)
                <div class="border-b border-b-[#dee2e6] pb-2">
                    <a href="{{ url('/photos/lifestyle') }}" class=" dark:text-slate-200 font-semibold">
                        <h1 class="text-xl md:text-2xl">লাইফস্টাইল</h1>
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    @foreach($lifestyleAlbums->take(8) as $album)
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
            @endif
            <!-- End Lifestyle Photo -->

            <!-- International Photo -->
            @if(count($internationalAlbums) > 0)
                <div class="border-b border-b-[#dee2e6] pb-2">
                    <a href="{{ url('/photos/international') }}" class=" dark:text-slate-200 font-semibold">
                        <h1 class="text-xl md:text-2xl">আন্তর্জাতিক</h1>
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    @foreach($internationalAlbums->take(8) as $album)
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
            @endif
            <!-- End International Photo -->

            <!-- Technology Photo -->
            @if(count($technologyAlbums) > 0)
                <div class="border-b border-b-[#dee2e6] pb-2">
                    <a href="{{ url('/photos/science-and-technology') }}" class=" dark:text-slate-200 font-semibold">
                        <h1 class="text-xl md:text-2xl">বিজ্ঞান ও প্রযুক্তি</h1>
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    @foreach($technologyAlbums->take(8) as $album)
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
            @endif
            <!-- End Technology Photo -->

        </div>
    </div>
@endsection


