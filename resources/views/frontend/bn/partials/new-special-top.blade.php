<div class="grid grid-cols-1 md:grid-cols-12 gap-8 my-4 border-b border-custom-bc dark:border-gray-600 pb-4">
    <div class="col-span-12 md:col-span-9 md:relative md:after:content-[''] md:after:absolute md:after:top-0 md:after:-right-4 md:after:w-[1px] md:after:h-full md:after:border-r after:dark:border-gray-600 after:border-custom-bc">
        <!-- First & Second Lead Post --->

        @php($spTopContent = $specialTopContents->shift())
        <div class="grid grid-cols-1 md:grid-cols-12 md:gap-8 pb-4 border-b border-custom-bc dark:border-gray-600">

           

            <div
                class="col-span-9 md:relative md:after:content-[''] md:after:absolute md:after:top-0 md:after:-right-4 md:after:w-[1px] md:after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600">
                <!-- First Lead Post --->
                <a href="{{ postURL($spTopContent->category->cat_slug, $spTopContent->content_id) }}"
                    class="grid grid-cols-12 h-full hover:no-underline focus:no-underline group">

                    <div class="col-span-12 md:col-span-7 overflow-hidden">
                        <img class="h-full w-full group-hover:scale-110 duration-500"
                            src="{{ $spTopContent->img_bg_path ? asset(config('appconfig.contentImagePath') . $spTopContent->img_bg_path) : asset(config('appconfig.commonImagePath') . Cache::get('bnSiteSettings')->og_image) }}"
                            alt="">
                    </div>
                    <div class="col-span-12 md:col-span-5 px-8 py-8 flex flex-col gap-0">
                        <span
                            class="lead_category text-red-500 text-base font-semibold">{{ $spTopContent->category->cat_name_bn }}
                        </span>
                        <h2 class="lead-text font-semibold text-black dark:text-slate-300">
                            <strong>{{ $spTopContent->content_heading }}</strong></h2>
                        <p class="lead-short-text text-black dark:text-gray-400">{!! fGetWord(fFormatString($spTopContent->content_details), 12) !!}</p>
                    </div>
                </a>
                <!-- First Lead Post --->
            </div>
            <div class="col-span-12 md:col-span-3 mt-6 md:mt-0 ">
                <!-- Second Lead Post --->
                @if ($specialTopContents[0])
                    <a href="{{ postURL($specialTopContents[0]->category->cat_slug, $specialTopContents[0]->content_id) }}"
                        class="flex flex-col gap-2 hover:no-underline focus:no-underline group relative">
                        <div class="overflow-hidden">
                            <img class="w-full group-hover:scale-110 duration-500"
                                src="{{ $specialTopContents[0]->img_bg_path ? asset(config('appconfig.contentImagePath') . $specialTopContents[0]->img_bg_path) : asset(config('appconfig.commonImagePath') . Cache::get('bnSiteSettings')->og_image) }}"
                                alt="">
                        </div>
                        <div>
                            <span
                                class="lead_category text-red-500 font-semibold text-base-color-2 text-base">{{ $specialTopContents[0]->category->cat_name_bn }}</span>
                            <h2
                                class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300">
                                <strong>{{ $specialTopContents[0]->content_heading }}</strong></h2>
                            <p class="lead-short-text text-black dark:text-gray-400">{!! fGetWord(fFormatString($specialTopContents[0]->content_details), 8) !!}</p>
                        </div>
                    </a>
                @endif
                <!--/ Second Lead Post --->
            </div>

        </div>
        <!--/ First & Second Lead Post --->

        <div class="grid grid-cols-2 gap-2 md:grid-cols-4 md:gap-8 pt-4 pb-4 border-b border-custom-bc dark:border-gray-600">
            @php($spBottomFourContents = $specialTopContents->splice(1, 4))
            @foreach ($spBottomFourContents as $spBottomFourContent)
                @if ($spBottomFourContent)
                    <a href="{{ postURL($spBottomFourContent->category->cat_slug, $spBottomFourContent->content_id) }}"
                        class="flex flex-col gap-2 hover:no-underline focus:no-underline group relative md:after:content-[''] md:after:absolute md:after:top-0 md:after:left-4 md:after:w-full md:after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600 mb-4 md:mb-0 border-b md:border-b-0 last:border-b-0 border-custom-bc dark:border-gray-600">
                        <div class="overflow-hidden">
                            <img class="w-full group-hover:scale-110 duration-500"
                                src="{{ $spBottomFourContent->img_bg_path ? asset(config('appconfig.contentImagePath') . $spBottomFourContent->img_bg_path) : asset(config('appconfig.commonImagePath') . Cache::get('bnSiteSettings')->og_image) }}"
                                alt="">
                        </div>
                        <div>
                            <span
                                class="lead_category text-red-500 text-base-color-2 text-base"><strong>{{ $spBottomFourContent->category->cat_name_bn }}</strong></span>
                            <h2
                                class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300">
                                <strong>{{ $spBottomFourContent->content_heading }}</strong></h2>
                            <p class="lead-short-text text-black dark:text-gray-400">{!! fGetWord(fFormatString($spBottomFourContent->content_details), 8) !!}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>

        <div class="grid grid-cols-2 gap-2 md:grid-cols-4 md:gap-8 pt-4">

            @php($spBottomMoreFourContents = $specialTopContents->splice(1, 4))
            @foreach ($spBottomMoreFourContents as $spBottomMoreFourContent)
                @if ($spBottomMoreFourContent)
                    <a href="{{ postURL($spBottomMoreFourContent->category->cat_slug, $spBottomMoreFourContent->content_id) }}"
                        class="flex flex-col gap-2 hover:no-underline focus:no-underline group relative md:after:content-[''] md:after:absolute md:after:top-0 md:after:left-4 md:after:w-full md:after:h-full md:after:border-r after:border-custom-bc mb-4 md:mb-0 after:dark:border-gray-600 border-b md:border-b-0 border-custom-bc dark:border-gray-600">
                        <div class="overflow-hidden">
                            <img class="w-full group-hover:scale-110 duration-500"
                                src="{{ $spBottomMoreFourContent->img_bg_path ? asset(config('appconfig.contentImagePath') . $spBottomMoreFourContent->img_bg_path) : asset(config('appconfig.commonImagePath') . Cache::get('bnSiteSettings')->og_image) }}"
                                alt="">
                        </div>
                        <div>
                            <span
                                class="lead_category text-red-500 text-base-color-2 text-base"><strong>{{ $spBottomMoreFourContent->category->cat_name_bn }}</strong></span>
                            <h2
                                class="post-title m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300">
                                <strong>{{ $spBottomMoreFourContent->content_heading }}</strong></h2>
                            <p class="lead-short-text text-black dark:text-gray-400">{!! fGetWord(fFormatString($spBottomMoreFourContent->content_details), 8) !!}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>

    </div>



    <div class="col-span-12 md:col-span-3">
        <div class="flex flex-col gap-3">
            @include('frontend.bn.partials.latest_posts')
        </div>
    </div>

</div>
