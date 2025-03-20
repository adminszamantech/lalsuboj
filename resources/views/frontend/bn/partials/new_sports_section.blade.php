<div class="flex flex-col py-4">
    <div class="category_header flex justify-between items-center dark:border-b-4 pb-1 dark:pb-2 dark:pt-1 dark:pb-1 border-b" style="border-color: red">
        <a href="/sports" class="flex flex-row gap-8 justify-center px-2">
            <div class="flex flex-row relative mt-2">
                <!-- First Square -->
                <div style="background: #00704A" class="w-4 h-4 absolute left-0 top-0 right-0"></div>
                <!-- Second Square -->
                <div class="w-4 h-4 bg-red-500 absolute left-2 top-2 bottom-0"></div>
            </div>
            <h2 class="category_text font-semibold text-base-color-3 dark:text-slate-200">খেলা <i style="color:red; font-size:18px" class="fa fa-chevron-right"></i></h2>
        </a>

    </div>
    <div class="grid grid-cols-12 gap-8 py-4 border-b border-custom-bc dark:border-gray-600">
        
        
        <!-- Middle Area (First content) -->
        <div class="col-span-12 md:col-span-4 border-t border-b py-4 md:border-t-0 md:border-b-0 md:py-0 border-custom-bc dark:border-gray-600 relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
            @php($sportsMiddleContent = $sportsContents[0])
            @if($sportsMiddleContent)
                <a href="{{ postURL($sportsMiddleContent->category->cat_slug, $sportsMiddleContent->content_id) }}" class="flex flex-col gap-2 hover:no-underline focus:no-underline group">
                    <div class="overflow-hidden">
                        <img class="w-full group-hover:scale-110 duration-500" src="{{ $sportsMiddleContent->img_bg_path ? asset(config('appconfig.contentImagePath').$sportsMiddleContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}" alt="">
                    </div>
                    <div class="flex flex-col gap-3">
                        <h2 class="category-heading-text text-base-color group-hover:text-base-color-hover dark:text-slate-300"><strong>{{ $sportsMiddleContent->content_heading }}</strong></h2>
                        <p class="lead-short-text text-[#555555] dark:text-gray-400">{!! fGetWord(fFormatString($sportsMiddleContent->content_details), 50) !!}</p>
                    </div>
                </a>
            @endif
        </div>
        <!-- Left Area (Next 3 contents) -->
        <div class="col-span-12 md:col-span-4 relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
            <div class="flex flex-col gap-2 grid grid-cols-2 gap-2">
                {{--@php($sportsLeftContents = $sportsContents->splice(0, 3)) --}}
                @php($sportsLeftContents = $sportsContents->slice(1, 4)->values())

                @if(count($sportsLeftContents) > 0)
                    @foreach($sportsLeftContents as $sportLeftContent)
                        <a href="{{ postURL($sportLeftContent->category->cat_slug, $sportLeftContent->content_id) }}" class="grid grid-cols-1 gap-2 hover:no-underline focus:no-underline group relative after:content-[''] after:absolute after:-bottom-4 after:left-0 after:w-full after:h-[1px]  after:dark:border-gray-600">
                            <div class="overflow-hidden">
                                <img class="w-full group-hover:scale-110 duration-500" src="{{ $sportLeftContent->img_bg_path ? asset(config('appconfig.contentImagePath').$sportLeftContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}" alt="">
                            </div>
                            <div>
                                <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><strong>{{ $sportLeftContent->content_heading }}</strong></h2>
                                <p class="lead-short-text text-black dark:text-gray-400">{!! fGetWord(fFormatString($sportLeftContent->content_details), 8) !!}</p>
                            </div>
                            
                        </a>
                    @endforeach
                @endif
            </div>
        </div>

        

        <!-- Right Area (Next 3 contents) -->
        <div class="col-span-12 md:col-span-4">
            <div class="flex flex-col gap-2 grid grid-cols-2 gap-2">
                @php($sportsRightContents = $sportsContents->slice(5, 4)->values())
                @if(count($sportsRightContents) > 0)
                    @foreach($sportsRightContents as $sportRightContent)
                        <a href="{{ postURL($sportRightContent->category->cat_slug, $sportRightContent->content_id) }}" class="grid grid-cols-1 gap-2 hover:no-underline focus:no-underline group relative after:content-[''] after:absolute after:-bottom-4 after:left-0 after:w-full after:h-[1px] after:dark:border-gray-600">
                            <div class="overflow-hidden">
                                <img class="w-full group-hover:scale-110 duration-500" src="{{ $sportRightContent->img_bg_path ? asset(config('appconfig.contentImagePath').$sportRightContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}" alt="">
                            </div>
                            <div>
                                <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><strong>{{ $sportRightContent->content_heading }}</strong></h2>
                                <p class="lead-short-text text-black dark:text-gray-400">{!! fGetWord(fFormatString($sportRightContent->content_details), 8) !!}</p>
                            </div>
                           
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

