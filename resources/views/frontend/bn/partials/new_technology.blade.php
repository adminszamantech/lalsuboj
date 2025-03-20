<div class="flex flex-col mb-2">
    <div class="category_header flex justify-between items-center dark:border-b-4 pb-1 dark:pb-2 dark:pt-1 dark:pb-1 border-b" style="border-color: red">
        <a href="{{ url('/technology') }}" class="flex flex-row gap-8 justify-center px-2">
            <div class="flex flex-row relative mt-2">
                <!-- First Square -->
                <div style="background: #00704A" class="w-4 h-4 absolute left-0 top-0 right-0"></div>
                <!-- Second Square -->
                <div class="w-4 h-4 bg-red-500 absolute left-2 top-2 bottom-0"></div>
            </div>
            <h2 class="category_text font-semibold text-base-color-3 dark:text-slate-200">তথ্যপ্রযুক্তি <i style="color:red; font-size:18px" class="fa fa-chevron-right"></i></h2>
        </a>
    </div>
    <div class="grid grid-cols-12 gap-4 md:gap-8 py-4">
        {{-- <div class="col-span-12 md:col-span-6 border-b md:border-b-0 border-custom-bc dark:border-gray-600 pb-2 md:pb-0 relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
            @php $techContentFirst = $technologyContents->shift() @endphp
            <a href="{{ postURL($techContentFirst->category->cat_slug, $techContentFirst->content_id) }}" class="flex flex-col gap-2 hover:no-underline focus:no-underline group">
                <div class=" overflow-hidden">
                    <img class="w-full group-hover:scale-110 duration-500" src="{{ $techContentFirst->img_bg_path ? asset(config('appconfig.contentImagePath').$techContentFirst->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}"  alt="">
                </div>
                <div class="flex flex-col gap-3">
                    <h2 class="category-heading-text text-base-color group-hover:text-base-color-hover dark:text-slate-300"><strong>{{ $techContentFirst->content_heading }}</strong></h2>
                    <p class="lead-short-text text-[#555555] dark:text-gray-400">{!! fGetWord(fFormatString($techContentFirst->content_details), 40) !!}</p>
                </div>
            </a>
        </div> --}}
        <div class="col-span-12 md:col-span-12">
            <div class="flex flex-col gap-2 grid grid-cols-2 gap-2">
                @php($techOtherContents = $technologyContents->splice(0,4))
                @if(count($techOtherContents) > 0)
                    @foreach($techOtherContents as $techOtherContent)
                        @if($techOtherContent)
                            <a href="{{ postURL($techOtherContent->category->cat_slug, $techOtherContent->content_id) }}" class="grid grid-cols-1 gap-2 hover:no-underline focus:no-underline group relative after:content-[''] after:absolute after:-bottom-4 after:left-0 after:w-full after:h-[1px after:dark:border-gray-600 after:dark:border-gray-600">
                                <div class="overflow-hidden">
                                    <img class="w-full group-hover:scale-110 duration-500" src="{{ $techOtherContent->img_bg_path ? asset(config('appconfig.contentImagePath').$techOtherContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}" alt="">
                                </div>
                                <div>
                                    <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><strong>{{ $techOtherContent->content_heading }}</strong></h2>
                                    <p class="lead-short-text text-black dark:text-gray-400">{!! fGetWord(fFormatString($techOtherContent->content_details), 10) !!}</p>
                                </div>
                               
                            </a>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

