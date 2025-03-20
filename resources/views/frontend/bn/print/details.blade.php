<!DOCTYPE html>
<html lang="bn">
@php
    $sURL = postURL($content->category->cat_slug, $content->content_id);
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $content->content_heading ?? '' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .sharethis-inline-share-buttons {
                display: inline-block !important;
            }
        }
        .sharethis-inline-share-buttons .sharethis-inline-share-button {
    background-color: #f0f0f0 !important; /* Light background for contrast */
    border: 1px solid #ccc;  /* Optional: add border for contrast */
    border-radius: 4px;  /* Optional: rounded corners */
}

/* Ensure icons stand out with proper color */
.sharethis-inline-share-buttons .sharethis-inline-share-button svg path {
    fill: #000 !important;  /* Change to a contrasting color like black */
}
    </style>
</head>

<body>

    <div class="row d-flex justify-content-center mt-3">
        <div class="col-md-12">
            <div class="my-3">
                <img style="width: 50%" src="{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo) }}" alt="{{ Cache::get('bnSiteSettings')->site_name }}">
            </div>
            <div class="card border-0">
                <div>
                    <h5><b>{{ $content->content_heading ?? '' }}</b></h5>
                </div>

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center relative">
                    <div class="col-12 col-md-6">
                        <div class="d-flex gap-2 align-items-center p-2 pb-md-0 border-top border-bottom border-1 my-2">
                            <div class="">
                                <img src="{{ $authors->count() ? asset('/media/authorImages/'.$authors->first()->img_path) : asset('/media/common/'.Cache::get('bnSiteSettings')->favicon) }}" alt="" class="rounded-circle" style="width: 40px; height: 40px;">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <p class="mb-0 text-black">
                                    {{ $authors->count() ? $authors->first()->author_name_bn : 'নতুনদেশ ডেস্ক' }}
                                </p>
                                <p class="text-black mb-0">প্রকাশ:
                                    <span>{{ fFormatDateEn2Bn(date('d F Y, h:i a', strtotime($content->created_at))) }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <img src="{{ asset(config('appconfig.contentImagePath').$content->img_bg_path) }}" class="w-full" alt="">
                    @if($content->img_bg_caption)
                        <div class="text-muted text-sm text-center border-bottom border-1">
                            <small style="font-size:10px;">{{ $content->img_bg_caption ?? '' }}</small>
                        </div>
                    @endif
                </div>

                <div class="mt-4">
                    <p>{!! $content->content_details !!}</p>
                    <div style="">
                        <div class="sharethis-inline-share-buttons" data-url="{{ $sURL }}" data-title="{{ $content->content_heading }}" style="margin: 0;"></div>
                    </div>
                </div>

                <div class="mt-3">
                    <img style="width: 35%" src="{{ asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo) }}" alt="{{ Cache::get('bnSiteSettings')->site_name }}">
                    <div class="mt-2">
                        <h6><b>ইমেইল:</b> info@lalsobuj24.com</h6>
                    </div>
                </div>
              <div>
               
              </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=67d9544354a3d000192a4590&product=inline-share-buttons&source=platform" async="async"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
       
       window.onload = function() {
            setTimeout(function() {
                window.print();
            }, 1000);

            window.onafterprint = function () {
                const url = @json($cancelUrl);
                window.location.href = url;
            };
        };
    </script>
</body>

</html>
