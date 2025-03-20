<div class="flex flex-col py-4">
    <div class="category_header flex justify-between items-center dark:border-b-4 pb-1 dark:pb-2 dark:pt-1 dark:pb-1 border-b" style="border-color: red">
        <a href="/entertainment" class="flex flex-row gap-8 justify-center px-2">
            <div class="flex flex-row relative mt-2">
                <!-- First Square -->
                <div style="background: #00704A" class="w-4 h-4 absolute left-0 top-0 right-0"></div>
                <!-- Second Square -->
                <div class="w-4 h-4 bg-red-500 absolute left-2 top-2 bottom-0"></div>
            </div>
            <h2 class="category_text font-semibold text-base-color-3 dark:text-slate-200">বিনোদন <i style="color:red; font-size:18px" class="fa fa-chevron-right"></i></h2>
        </a>

    </div>
    <div class="grid grid-cols-12 gap-8 py-4 border-b border-custom-bc dark:border-gray-600">
        <!-- Left Area (Next 3 contents) -->
        <div class="col-span-12 md:col-span-4 relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
            <div class="flex flex-col gap-8">
                {{--@php($sportsLeftContents = $sportsContents->splice(0, 3)) --}}
                @php($entertainmentLeftContents = $entertainmentContents->slice(1, 3)->values())

                @if(count($entertainmentLeftContents) > 0)
                    @foreach($entertainmentLeftContents as $enterLeftContent)
                        <a href="{{ postURL($enterLeftContent->category->cat_slug, $enterLeftContent->content_id) }}" class="grid grid-cols-2 gap-2 hover:no-underline focus:no-underline group relative after:content-[''] after:absolute after:-bottom-4 after:left-0 after:w-full after:h-[1px] after:border-b after:border-custom-bc last:after:border-0 after:dark:border-gray-600">
                            <div>
                                <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><strong>{{ $enterLeftContent->content_heading }}</strong></h2>
                                <p class="lead-short-text text-black dark:text-gray-400">{!! fGetWord(fFormatString($enterLeftContent->content_details), 8) !!}</p>

                            </div>
                            <div class="overflow-hidden">
                                <img class="w-full group-hover:scale-110 duration-500" src="{{ $enterLeftContent->img_bg_path ? asset(config('appconfig.contentImagePath').$enterLeftContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}" alt="">
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Middle Area (First content) -->
        <div class="col-span-12 md:col-span-4 border-t border-b py-4 md:border-t-0 md:border-b-0 md:py-0 border-custom-bc dark:border-gray-600 relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
            @php($entertainMiddleContent = $entertainmentContents[0])
            @if($entertainMiddleContent)
                <a href="{{ postURL($entertainMiddleContent->category->cat_slug, $entertainMiddleContent->content_id) }}" class="flex flex-col gap-2 hover:no-underline focus:no-underline group">
                    <div class="overflow-hidden">
                        <img class="w-full group-hover:scale-110 duration-500" src="{{ $entertainMiddleContent->img_bg_path ? asset(config('appconfig.contentImagePath').$entertainMiddleContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}" alt="">
                    </div>
                    <div class="flex flex-col gap-3">
                        <h2 class="category-heading-text text-base-color group-hover:text-base-color-hover dark:text-slate-300"><strong>{{ $entertainMiddleContent->content_heading }}</strong></h2>
                        <p class="lead-short-text text-[#555555] dark:text-gray-400">{!! fGetWord(fFormatString($entertainMiddleContent->content_details), 50) !!}</p>
                    </div>
                </a>
            @endif
        </div>

        <!-- Right Area (Next 3 contents) -->
        <div class="col-span-12 md:col-span-4">
            <div class="flex flex-col gap-8">
                @php($entertainRightContents = $entertainmentContents->slice(4, 3)->values())
                @if(count($entertainRightContents) > 0)
                    @foreach($entertainRightContents as $entertainRightContent)
                        <a href="{{ postURL($entertainRightContent->category->cat_slug, $entertainRightContent->content_id) }}" class="grid grid-cols-2 gap-2 hover:no-underline focus:no-underline group relative after:content-[''] after:absolute after:-bottom-4 after:left-0 after:w-full after:h-[1px] after:border-b after:border-custom-bc last:after:border-0 after:dark:border-gray-600">
                            <div>
                                <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><strong>{{ $entertainRightContent->content_heading }}</strong></h2>
                                <p class="lead-short-text text-black dark:text-gray-400">{!! fGetWord(fFormatString($entertainRightContent->content_details), 8) !!}</p>
                            </div>
                            <div class="overflow-hidden">
                                <img class="w-full group-hover:scale-110 duration-500" src="{{ $entertainRightContent->img_bg_path ? asset(config('appconfig.contentImagePath').$entertainRightContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}" alt="">
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

