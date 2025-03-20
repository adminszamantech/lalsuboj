<div class="grid grid-cols-1 md:grid-cols-12 gap-8 py-6">
    <div class="col-span-12 md:col-span-12 relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:dark:border-gray-600 after:border-custom-bc items-center  dark:border-[#fff2]">
        <div class="category_header flex justify-between items-center dark:border-b-4 pb-1 dark:pb-2 dark:pt-1 dark:pb-1 border-b" style="border-color: red">
            <a href="/politics" class="flex flex-row gap-8 justify-center px-2">
                <div class="flex flex-row relative mt-2">
                    <!-- First Square -->
                    <div style="background: #00704A" class="w-4 h-4 absolute left-0 top-0 right-0"></div>
                    <!-- Second Square -->
                    <div class="w-4 h-4 bg-red-500 absolute left-2 top-2 bottom-0"></div>
                </div>
                <h2 class="category_text font-semibold text-base-color-3 dark:text-slate-200">  রাজনীতি <i style="color:red; font-size:18px" class="fa fa-chevron-right"></i></h2>  
            </a>
        </div>
        <!-- First & Second Lead Post --->
        @php($politicsContent = $politicsContents->shift())
        <div class="grid grid-cols-1 md:grid-cols-12 md:gap-8 py-4 border-b border-custom-bc dark:border-gray-600">
            <div class="col-span-9 border-b md:border-b-0 border-custom-bc dark:border-gray-600 pb-4 md:pb-0 relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 after:w-[1px] after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                <!-- First Lead Post --->
                <a href="{{ postURL($politicsContent->category->cat_slug, $politicsContent->content_id) }}" class="grid grid-cols-12 gap-4  h-full hover:no-underline focus:no-underline group group">
                    
                    <div class="col-span-12 md:col-span-7 overflow-hidden">
                        <img class="h-full w-full group-hover:scale-110 duration-500" src="{{ $politicsContent->img_bg_path ? asset(config('appconfig.contentImagePath').$politicsContent->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}" alt="">
                    </div>
                    <div class="col-span-12 md:col-span-5 flex flex-col gap-6">
                        <h2 class="category-heading-text text-base-color group-hover:text-base-color-hover dark:text-slate-300"><strong>{{ $politicsContent->content_heading }}</strong></h2>
                        <p class="lead-short-text text-[#555555] dark:text-gray-400">{!! fGetWord(fFormatString($politicsContent->content_details), 50) !!}</p>
                    </div>
                  
                </a>
                <!-- First Lead Post --->
            </div>

            <div class="col-span-12 md:col-span-3 mt-6 md:mt-0 ">
                <!-- Second Lead Post --->
                @if($politicsContents[0])
                    <a href="{{ postURL($politicsContents[0]->category->cat_slug, $politicsContents[0]->content_id) }}" class="flex flex-col gap-2 hover:no-underline focus:no-underline group group relative">
                        <div class="overflow-hidden">
                            <img class="w-full group-hover:scale-110 duration-500" src="{{ $politicsContents[0]->img_bg_path ? asset(config('appconfig.contentImagePath').$politicsContents[0]->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}" alt="">
                        </div>
                        <div>
                            <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><strong>{{ $politicsContents[0]->content_heading }}</strong></h2>
                            <p class="lead-short-text text-black dark:text-gray-400">{!! fGetWord(fFormatString($politicsContents[0]->content_details), 8) !!}</p>
                        </div>
                    </a>
            @endif
            <!--/ Second Lead Post --->
            </div>
        </div>
        <!--/ First & Second Lead Post --->

        <div class="grid grid-cols-2 gap-2 md:grid-cols-4 md:gap-8 pt-4 pb-4 md:border-b border-b-0 border-custom-bc dark:border-gray-600">
            @php($politicsBtContents = $politicsContents->splice(1,6))

            @foreach($politicsBtContents as $ntBottomCont)
                @if($ntBottomCont)
                    <a href="{{ postURL($ntBottomCont->category->cat_slug, $ntBottomCont->content_id) }}" class="flex flex-col gap-2 hover:no-underline focus:no-underline group group relative md:after:content-[''] md:after:absolute md:after:top-0 md:after:left-4 md:after:w-full md:after:h-full md:after:border-r md:after:border-custom-bc md:after:dark:border-gray-600 mb-4 md:mb-0 border-b md:border-b-0 pb-2 md:pb-0 border-custom-bc dark:border-gray-600">
                        <div class="overflow-hidden">
                            <img class="w-full group-hover:scale-110 duration-500" src="{{ $ntBottomCont->img_bg_path ? asset(config('appconfig.contentImagePath').$ntBottomCont->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}" alt="">
                        </div>
                        <div>
                            <h2 class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300"><strong>{{ $ntBottomCont->content_heading }}</strong></h2>
                            <p class="lead-short-text text-black dark:text-gray-400">{!! fGetWord(fFormatString($ntBottomCont->content_details), 8) !!}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
           @include('frontend.bn.ads.home.middle-2-ad')
    </div>
</div>