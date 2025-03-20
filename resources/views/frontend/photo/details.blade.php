@extends('frontend.bn.app')

@section('title')
    {{ $detailAlbum->album_name }}
@endsection

@section('mainContent')

    <div class="news_container">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 md:col-span-12">
                <nav class="print:hidden pt-4">
                    <ol class="flex items-center gap-1 text-sm text-gray-600 border-b border-custom-bc dark:border-gray-500 w-fit">
                        <li>
                            <a href="{{ url('/photos') }}" class="block transition hover:text-gray-700 dark:text-gray-200 dark:hover:text-gray-300 text-base">ফটো গ্যালারি </a>
                        </li>
                    </ol>
                </nav>
                <div class="detail_image w-[800px] max-w-full mx-auto pb-4">
                    <div class="news_heading py-4 border-b border-custom-bc dark:border-gray-600 print:border-none print:pb-1 print:pt-3">
                        <h2 class="text-2xl lg:text-3xl leading-[35px] lg:leading-[35px] dark:text-slate-200 print:text-2xl">{{ $detailAlbum->album_name }}</h2>
                    </div>
                    <div class="demo-gallery">
                        <ul id="lightgallery" class="list-unstyled">
                            @php($photos = $detailAlbum->album_details)
                            @foreach($photos as $photo)
                                <div class="single-block auto my-4">
                                    <div class="img-box">
                                        <img class="w-full" src="{{ asset(config('appconfig.photoAlbumImagePath'). $photo['img']) }}" alt="{{ $photo['caption'] }}">
                                    </div>
                                    @if($photo['caption'])
                                        <p class="py-1 px-4 text-center bg-black text-white">{{ $photo['caption'] }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


