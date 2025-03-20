@extends('frontend.bn.app')

@section('title', 'সর্বশেষ । '.Cache::get('bnSiteSettings')->site_name)

@section('mainContent')
    <div class="news_container">
        
        <div class="breadcrumb pt-4 mb-4">
            <div class="border-b-[1px] border-custom-dbc">
                <div class="mb-3">
                    <a class="block w-fit" href="#">
                        <h1 class="text-xl md:text-2xl dark:text-slate-200">সর্বশেষ</h1>
                    </a>
                </div>
            </div>
        </div>
        <div class="category-content">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-4">
                <div class="col-span-12 lg:col-span-12 xl:col-span-12 relative after:content-[''] after:absolute after:top-0 after:-right-3 after:w-[1px] after:h-full after:border-r after:dark:border-gray-600 after:border-custom-bc">
                    <!-- Category Loop Content -->
                    <div class="latest_loop_content pb-4">
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-6" id="loopLatestPostContainer">
                        @foreach($latestPosts as $latest_post)
                            <!-- Loop Content -->
                                <a href="{{ postURL($latest_post->category->cat_slug, $latest_post->content_id) }}" class="col-span-12 md:col-span-6 relative group after:content-[''] after:absolute after:top-0 after:-right-3 after:w-[1px] after:h-full after:border-r last:after:border-0 after:border-custom-bc after:dark:border-gray-600">
                                    <div class="grid grid-cols-12 gap-2">
                                        <div class="col-span-7">
                                            <h2 class="text-[19px] text-base-color dark:text-slate-300 group-hover:text-base-color-hover leading-[1.68rem]"><strong>{{ $latest_post->content_heading }}</strong></h2>
                                            <p class="lead-short-text text-black dark:text-gray-400">{!! fGetWord(fFormatString($latest_post->content_details), 8) !!}</p>
                                        </div>
                                        <div class="col-span-5 overflow-hidden">
                                            <img class="w-full group-hover:scale-110 duration-500" src="{{ $latest_post->img_bg_path ? asset(config('appconfig.contentImagePath').$latest_post->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image) }}" alt="{{ $latest_post->content_heading }}">
                                        </div>
                                    </div>
                                    <div class="w-full h-[1px] bg-custom-bc dark:bg-gray-600 absolute -bottom-3 left-0"></div>
                                </a>
                                <!-- End Loop Content -->
                            @endforeach
                        </div>
                    </div>
                    @include('frontend.bn.ads.category.category-top-ad')
                    <div class="flex items-center justify-center">
                        <button id="latest_read_moreBtn" onclick="loadMoreLatestContent()" style="background: #00704A;" class="px-4 py-2 text-center block text-white hover:bg-base-color-3 hover:no-underline focus:no-underline group hover:text-white rounded-sm text-base mt-4">
                            <span>আরও দেখুন</span>
                        </button>
                        <button id="loading" onclick="loadMoreLatestContent()" style="background: #00704A" class="hidden px-4 py-2 text-center block text-white hover:bg-base-color-3 hover:no-underline focus:no-underline group hover:text-white rounded-sm text-base mt-4">
                            <span>লোডিং...</span>
                        </button>
                    </div>
                    <!-- Category Loop Content -->
                </div>
                {{-- <div class="col-span-12 lg:col-span-4 xl:col-span-3">
                    <div class="flex flex-col gap-3">
                        <div class="ads">
                            <img class="w-full" src="https://tpc.googlesyndication.com/simgad/4846314120925667976" alt="">
                        </div>
                        <div class="ads">
                            <img class="w-full" src="https://tpc.googlesyndication.com/simgad/10644298170550561663" alt="">
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <script>
        let offset = 10; // Initial offset (you've already loaded 10 posts)

        function loadMoreLatestContent(){
            let loading = document.getElementById('loading');
            loading.classList.remove('hidden')
            let readMore = document.getElementById('latest_read_moreBtn');
            readMore.classList.add('hidden')

            axios.post('{{ route('load.more.latest.posts') }}', {
                _token: "{{ csrf_token() }}",
                offset: offset
            }).then(response => {
                let postsContainer = document.getElementById('loopLatestPostContainer');

                response.data.posts.forEach(post => {
                    let postElement = document.createElement('a');
                    postElement.classList.add('col-span-12');
                    postElement.classList.add('md:col-span-6');
                    postElement.classList.add('relative');
                    postElement.classList.add('group');
                    postElement.classList.add("after:content-['']");
                    postElement.classList.add("after:absolute");
                    postElement.classList.add("after:top-0");
                    postElement.classList.add("after:-right-3");
                    postElement.classList.add("after:w-[1px]");
                    postElement.classList.add("after:h-full");
                    postElement.classList.add("after:border-r");
                    postElement.classList.add("last:after:border-0");
                    postElement.classList.add("after:border-custom-bc");
                    postElement.classList.add("after:dark:border-gray-600");
                    // console.log(post)
                    let content =  post.content_details ; // your string with strong tags
                    let cleanedContent = content.replace(/<strong>/g, '').replace(/<\/strong>/g, '').split(' ').slice(0, 8).join(' ');


                    postElement.href = `/details/${post.category.cat_slug}/${post.content_id}`;
                    postElement.innerHTML = `<div class="grid grid-cols-12 gap-2">
                            <div class="col-span-7">
                                <h2 class="text-[19px] text-base-color dark:text-slate-300 group-hover:text-base-color-hover leading-[1.68rem]"><strong>${ post.content_heading }</strong></h2>
                                <p class="lead-short-text text-black dark:text-gray-400">${ cleanedContent + '...' }</p>
                            </div>
                            <div class="col-span-5 overflow-hidden">
                                <img class="w-full group-hover:scale-110 duration-500" src="/media/content/images/${ post.img_bg_path }" alt="${ post.content_heading }">
                            </div>
                        </div>
                        <div class="w-full h-[1px] bg-custom-bc dark:bg-gray-600 absolute -bottom-3 left-0"></div>`
                    postsContainer.appendChild(postElement);
                });

                loading.classList.add('hidden')
                readMore.classList.remove('hidden')

                // Increment offset by 10
                offset += 10;

                // // Hide the read more button if no more posts
                if (!response.data.hasMorePosts) {
                    readMore.classList.add('hidden')
                }


            })
        }


    </script>
@endsection
