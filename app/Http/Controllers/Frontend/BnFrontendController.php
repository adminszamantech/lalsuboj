<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Services\AdManagementService;
use App\Http\Services\MobileAdManagementService;
use App\Http\Controllers\Backend\Bn\BnHelperController;
use App\Http\Controllers\Backend\Photo\PhotoHelperController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\En\EnHelperController;
use App\Http\Services\Bn\BnBreakingNewsService;
use App\Http\Services\Bn\BnContentService;
use App\Http\Services\Bn\BnVideoService;
use App\Http\Services\Bn\ElectionService;
use App\Models\BnAuthor;
use App\Models\BnCategory;
use App\Models\BnContent;
use App\Models\BnContentPosition;
use App\Models\BnPoll;
use App\Models\BnSubcategory;
use App\Models\BnTag;
use App\Models\Epaper;
use App\Models\Magazine;
use App\Models\MagazinePage;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Services\En\EnContentService;

class BnFrontendController extends Controller
{
    

    public function index(){
        // Desktop Ads
        $adService = new AdManagementService();
        $ads = $adService->getAllAds();

        // Mobile Ads
        $mobileAdsService = new MobileAdManagementService();
        $mobileAds = $mobileAdsService->getAllAds();

        // Breaking news - it comes from caching
        $breakingContents = (new BnBreakingNewsService())->getBreakingNews();

        // Special Event
        $specialEventContents = (new BnContentService())->getPositionContent(2, null);

        // Election data
        $electionData = (new ElectionService())->getElectionData();

        // Special event news
        $specialArrangementContents = (new BnContentService())->getPositionContent(3, null);

        // Special Event videos - it comes from caching
        $bnSpecialEventVideos = (new BnVideoService())->getBnSpecialEventVideos();

        // Special top videos - it comes from caching
        $bnSpecialTopVideos = (new BnVideoService())->getBnSpecialTopVideos();

        // Special Top Contents
        $specialTopContents = (new BnContentService())->getPositionContent(1, null);

        // Latest contents
        $latestContents = BnHelperController::getLatestContent(10);

        // Popular contents
        $popularContents = BnHelperController::getPopularContent(10);

        // Rajdhani contents
        $rajdhaniContents = BnHelperController::getCategoryContent(19, 6);

        // Special report contents
        $specialReportContents = BnHelperController::getCategoryContent(30, 4);

        // National Contents
        $nationalContents = (new BnContentService())->getPositionContent(4, 1);


        $politicsContents = (new BnContentService())->getPositionContent(null, 2);

        // Economy Content
        $economyContents = (new BnContentService())->getPositionContent(null, 3);
// return $economyContents;
        // International Content
        $internationalContents = (new BnContentService())->getPositionContent(null, 15);

        // Sports Content
        $sportsContents = (new BnContentService())->getPositionContent(null, 5);

        // Health Content
        $healthContents = BnHelperController::getCategoryContent(10, 5);

        // Lifestyle Content
        $lifestyleContents = BnHelperController::getCategoryContent(9, 5);

        // Art & Culture Content
        $artCulContents = BnHelperController::getCategoryContent(43, 5);

        // Technology Content
        $technologyContents = BnHelperController::getCategoryContent(7, 5);

        // Education Content
        $educationContents = BnHelperController::getCategoryContent(11, 5);

        // Entertainment Content
        //$educationContents = BnHelperController::getCategoryContent(6, 5);
        $entertainmentContents = (new BnContentService())->getPositionContent(null, 6);

        // Saradesh Content
        $saradeshContents = (new BnContentService())->getPositionContent(null, 16);

        // Literature Content
        $literatureContents = BnHelperController::getCategoryContent(8, 5);

        // Opinion Content
        $opinionContents = BnHelperController::getCategoryContent(21, 7);


        // Religion Content
        $religionContents = BnHelperController::getCategoryContent(17, 5);

        // Career Content
        //$careerContents = BnHelperController::getCategoryContent(12, 7);
        $careerContents = (new BnContentService())->getPositionContent(null, 12);


        // Special Article Content
        $specialArticleContents = BnHelperController::getCategoryContent(25, 7);

        // Campus Content
        $campusContents = BnHelperController::getCategoryContent(26, 7);


        // Law and Court Content
        $lawContents = BnHelperController::getCategoryContent(14, 5);

        // Crime Content
        $crimeContents = BnHelperController::getCategoryContent(33, 4);

        // Children Content
        $childrenContents = BnHelperController::getCategoryContent(27, 5);

        // Motivation Content
        $motivationContents = BnHelperController::getCategoryContent(28, 5);

        // Probash Content
        $probashContents = BnHelperController::getCategoryContent(23, 5);

        // Corporate Content
        $corporateContents = BnHelperController::getCategoryContent(36, 5);

        //election Special Content
//        $elcetion_content_ids = ['2202', '2203', 2204];
//        $electionSpecialContents = BnContent::whereIn('content_id', $elcetion_content_ids)->get();

        // Photo Gallery
        $photoAlbums = PhotoHelperController::getPositionContent(1, null);

        Carbon::setLocale('bn');

        //$nibachonContent = BnHelperController::getTagContent('জাতীয়-নির্বাচন', 4, false);
        //$nibachonContent = (new BnContentService())->getPositionContent(12, null, $this->electionSpecialContentsCacheKey);

        //return view('frontend.bn.home-new', compact('bnSpecialEventVideos', 'specialArrangementContents', 'specialEventContents', 'breakingContents', 'bnSpecialTopVideos','specialTopContents', 'latestContents', 'popularContents', 'rajdhaniContents', 'specialReportContents', 'nationalContents', 'politicsContents', 'economyContents', 'internationalContents', 'artCulContents', 'lifestyleContents', 'sportsContents', 'healthContents', 'technologyContents', 'educationContents', 'literatureContents', 'saradeshContents', 'entertainmentContents', 'opinionContents', 'religionContents', 'careerContents', 'specialArticleContents', 'campusContents', 'lawContents', 'crimeContents', 'photoAlbums', 'childrenContents', 'motivationContents', 'probashContents', 'corporateContents', 'electionData', 'nibachonContent'));
        return view('frontend.bn.home-new', compact('breakingContents','specialTopContents', 'latestContents', 'nationalContents', 'politicsContents', 'sportsContents', 'saradeshContents', 'internationalContents', 'entertainmentContents', 'lawContents', 'crimeContents', 'lifestyleContents', 'healthContents', 'educationContents', 'technologyContents', 'careerContents', 'photoAlbums', 'ads', 'mobileAds','economyContents'));
    }



    public function categoryContent($catSlug){

        $category = BnCategory::with('subCategories')->where('cat_slug', $catSlug)->where('status', 1)->where('deletable', 1)->first();
        if(is_null($category)){
            abort(404);
        }

        $catId = $category->cat_id;

        $contents = BnHelperController::getCategoryContent($catId, 14, false); // Paginate = true or false

        $randomCatId = rand(1,20);
        if ($randomCatId == $catId) {
            $randomCatId = rand(1,20);
        }
        $otherCatContents = BnHelperController::getCategoryContent($randomCatId, 5);

        // Desktop Ads
        $adService = new AdManagementService();
        $ads = $adService->getAllAds();

        // Mobile Ads
        $mobileAdsService = new MobileAdManagementService();
        $mobileAds = $mobileAdsService->getAllAds();

        return view("frontend.bn.category", compact('category', 'contents', 'otherCatContents', 'ads', 'mobileAds'));
    }

    public function loadMoreCategoryPosts(Request $request)
    {
        $categoryId = $request->input('category_id');
        $offset = $request->input('offset'); // the current offset of posts
        $limit = 10; // number of posts to load on each click

        // Fetch the next 10 posts
        $posts = BnContent::with('category')->select('cat_id','content_id','content_heading', 'content_sub_heading', 'content_details', 'img_bg_path', 'created_at', 'updated_at')->where('cat_id', $categoryId)
            ->where('status', 1)->where('deletable', 1)
            ->skip($offset)
            ->take($limit)
            ->orderBy('content_id', 'desc')
            ->get();

        // Check if there are more posts
        $hasMorePosts = BnContent::where('cat_id', $categoryId)->count() > ($offset + $limit);

        // Return posts as JSON response
        return response()->json([
            'posts' => $posts,
            'hasMorePosts' => $hasMorePosts,
        ]);
    }

    public function latestPostContents(){

        $latestPosts = BnContent::with('category', 'subcategory')->where('status', 1)->where('deletable', 1)->orderBy('content_id', 'desc')->take(10)->get();
        $randomCatId = rand(1,20);
        $otherCatContents = BnHelperController::getCategoryContent($randomCatId, 5);

        // Desktop Ads
        $adService = new AdManagementService();
        $ads = $adService->getAllAds();

        // Mobile Ads
        $mobileAdsService = new MobileAdManagementService();
        $mobileAds = $mobileAdsService->getAllAds();

        return view("frontend.bn.latest-post", compact('latestPosts', 'otherCatContents', 'ads', 'mobileAds'));

    }

    public function loadMoreLatestPosts(Request $request)
    {

        $offset = $request->input('offset'); // the current offset of posts
        $limit = 10; // number of posts to load on each click

        // Fetch the next 10 posts
        $posts = BnContent::with('category')
            ->select('cat_id','content_id','content_heading', 'content_sub_heading', 'content_details', 'img_bg_path', 'created_at', 'updated_at')
            ->where('status', 1)->where('deletable', 1)
            ->skip($offset)
            ->take($limit)
            ->orderBy('content_id', 'desc')
            ->get();

        // Check if there are more posts
        $hasMorePosts = BnContent::where('status', 1)->where('deletable', 1)->count() > ($offset + $limit);

        // Return posts as JSON response
        return response()->json([
            'posts' => $posts,
            'hasMorePosts' => $hasMorePosts,
        ]);
    }

    public function subcategoryContent($cat, $subcat){

        $category = BnCategory::with('subCategories')->select('cat_id', 'cat_name', 'cat_name_bn', 'cat_slug', 'cat_title')->where('cat_slug', $cat)->where('status', 1)->where('deletable', 1)->first();

        if (is_null($category)) abort(404);

        $subcategory = BnSubcategory::select('subcat_id', 'cat_id', 'subcat_name', 'subcat_name_bn', 'subcat_slug')->where('cat_id', $category->cat_id)->where('subcat_slug', $subcat)->where('status', 1)->where('deletable', 1)->first();

        if (is_null($subcategory)) abort(404);

        $contents = BnContent::with('category', 'subcategory')->where('cat_id', $category->cat_id)->where('subcat_id', $subcategory->subcat_id)->where('status', 1)->where('deletable', 1)->orderBy('content_id', 'desc')->take(14)->get();

//        $latestContents = BnHelperController::getLatestContent(5);
//        $popularContents = BnHelperController::getPopularContent(5);
        $randomCatId = rand(1,20);
        if ($randomCatId == $category->cat_id) {
            $randomCatId = rand(1,20);
        }
        $otherCatContents = BnHelperController::getCategoryContent($randomCatId, 5);

        // Desktop Ads
        $adService = new AdManagementService();
        $ads = $adService->getAllAds();

        // Mobile Ads
        $mobileAdsService = new MobileAdManagementService();
        $mobileAds = $mobileAdsService->getAllAds();

        return view('frontend.bn.subcategory', compact('category', 'subcategory', 'contents', 'otherCatContents', 'ads', 'mobileAds'));

    }
    public function loadMoreSubcategoryPosts(Request $request)
    {
        $categoryId = $request->input('category_id');
        $subcategoryId = $request->input('subcategory_id');
        $offset = $request->input('offset'); // the current offset of posts
        $limit = 10; // number of posts to load on each click

        // Fetch the next 10 posts
        $posts = BnContent::with('category')
            ->select('cat_id','subcat_id','content_id','content_heading', 'content_sub_heading', 'content_details', 'img_bg_path', 'created_at', 'updated_at')
            ->where('cat_id', $categoryId)
            ->where('subcat_id', $subcategoryId)
            ->where('status', 1)->where('deletable', 1)
            ->skip($offset)
            ->take($limit)
            ->orderBy('content_id', 'desc')
            ->get();

        // Check if there are more posts
        $hasMorePosts = BnContent::where('cat_id', $categoryId)
                        ->where('subcat_id', $subcategoryId)
                        ->count() > ($offset + $limit);

        // Return posts as JSON response
        return response()->json([
            'posts' => $posts,
            'hasMorePosts' => $hasMorePosts,
        ]);
    }

    public function details($cat_slug, $contentId)
    {

        // Desktop Ads
        $adService = new AdManagementService();
        $ads = $adService->getAllAds();

        // Mobile Ads
        $mobileAdsService = new MobileAdManagementService();
        $mobileAds = $mobileAdsService->getAllAds();

        if (!is_numeric($contentId)) abort(404);

        $detailsContent = BnContent::with('category', 'subcategory')->where('content_id', $contentId)->where('status', 1)->where('deletable', 1)->first();
        if (!$detailsContent) abort(404);

        BnContent::where('content_id', $contentId)->increment('total_hit');


        $aAuthorSlugs = explode(',', $detailsContent->author_slugs);
        $sAuthorSlugs = "'" . implode("','",$aAuthorSlugs) . "'";

        $authors = BnAuthor::query()
            ->select(['author_name_bn', 'author_slug', 'img_path'])
            ->whereIn('author_slug', $aAuthorSlugs)
            ->where('deletable', 1)
            ->orderByRaw("FIELD(author_slug, $sAuthorSlugs)")
            ->get();

        $relatedContents = BnContent::with('category', 'subcategory')
            ->where('cat_id', $detailsContent->cat_id)
            ->where('content_id', '<>', $contentId)
            ->where('status', 1)
            ->where('deletable', 1)
            ->latest()
            ->take(5)
            ->get();


        $latestContents = BnContent::with('category', 'subcategory')
            ->where('content_id', '<>', $contentId)
            ->where('status', 1)
            ->where('deletable', 1)
            ->latest()
            ->take(4)
            ->get();


        return view('frontend.bn.details', compact('detailsContent', 'authors', 'relatedContents', 'latestContents', 'ads', 'mobileAds'));
    }



    public function tagContent($tagSlug){
        $tag = BnTag::where('tag_slug', $tagSlug)->where('deletable', 1)->first();
        if(is_null($tag)){
            abort(404);
        }

        $contents = BnHelperController::getTagContent($tagSlug, 15, true);

        // Desktop Ads
        $adService = new AdManagementService();
        $ads = $adService->getAllAds();

        // Mobile Ads
        $mobileAdsService = new MobileAdManagementService();
        $mobileAds = $mobileAdsService->getAllAds();

        return view("frontend.bn.tag", compact('tag', 'contents', 'ads', 'mobileAds'));
    }

    public function authorContent($authorSlug){
        $author = BnAuthor::where('author_slug', $authorSlug)->where('deletable', 1)->first();
        if(is_null($author)){
            abort(404);
        }

        $contents = BnHelperController::getAuthorContent($authorSlug, 15, true);

        return view("frontend.bn.author", compact('author', 'contents'));
    }

    public function archive(){
        $catId = trim(request()->cat);
        $dateFrom = trim(request()->dateFrom);
        $dateTo = trim(request()->dateTo);
        $keyword = trim(request()->keyword);

        $contents = BnContent::with('category', 'subcategory');

        if ($catId) $contents = $contents->where('cat_id', $catId);

        if ($dateFrom && $dateTo) $contents = $contents->whereBetween('created_at', [$dateFrom.' 00:00:00', $dateTo.' 23:59:59']);

//        if ($dateTo) $contents = $contents->where('created_at', 'like', $dateTo.'%');

        if ($keyword) $contents = $contents->where('content_heading', 'like', '%'.$keyword.'%');

        $contents = $contents->where('status', 1)->where('deletable', 1)->orderBy('content_id', 'desc')->paginate(20);

        $categories = BnCategory::select('cat_id', 'cat_name', 'cat_name_bn')->where('deletable', 1)->where('status', 1)->get();

        $latestContents = BnHelperController::getLatestContent();
        $popularContents = BnHelperController::getPopularContent();
        return view('frontend.bn.archive', compact('categories', 'contents', 'latestContents', 'popularContents', 'catId', 'dateFrom', 'dateTo', 'keyword'));
    }

    public function getEpaper($date) {
        // =========== main Code ==============
//        $epaper = Epaper::query()->with('pages:id,epaper_id,img_thumb_path,page_no')->select(['id', 'paper_date', 'meta_keywords', 'meta_description', 'og_img_path'])->where('paper_date', Carbon::now()->toDateString())->where('status', 1)->where('deletable', 1)->first();
        // =========== main Code ==============
        $epaper = Epaper::query()->with('pages:id,epaper_id,img_thumb_path,page_no')->select(['id', 'paper_date', 'meta_keywords', 'meta_description', 'og_img_path'])->where('paper_date', date("Y-m-d", strtotime($date)))->where('status', 1)->where('deletable', 1)->first();

//        if (!$epaper) {
//            $epaper = Epaper::query()->with('pages:id,epaper_id,img_thumb_path,page_no')->select(['id', 'paper_date', 'meta_keywords', 'meta_description', 'og_img_path'])->where('paper_date', now()->subDay()->format('Y-m-d'))->where('status', 1)->where('deletable', 1)->first();
//        }

        if (!$epaper) abort(404);

        return view("frontend.bn.epaper", compact('epaper'));
    }

    public function getMagazines() {
        $magazine = Magazine::query()->with('pages:id,magazine_id,img_thumb_path,counter')->select(['id', 'name', 'meta_keywords', 'meta_description', 'og_img_path'])->where('status', 1)->where('deletable', 1)->first();

        return view("frontend.bn.magazine", compact('magazine'));
    }

    public function generateSitemap(){
        $contents = BnHelperController::getLatestContent(200);

        $sData = '<?xml version="1.0" encoding="UTF-8"?>
                    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">';

        foreach ($contents as $content){
            $sHeading=$content->content_heading;
            $sCategoryNameBN=strip_tags($content->category->cat_name_bn);
            $sURL=fDesktopURL($content->content_id, $content->category->cat_slug, (!is_null($content->subcategory) ? $content->subcategory->subcat_slug : null), $content->content_type);
            //Date Time
            $timestamp=date('Y-m-d\TH:i:sP', strtotime($content->created_at));
            $sData .= "<url>
                            <loc>$sURL</loc>
                            <news:news>
                                <news:publication>
                                <news:name>ঢনতুনদেশ২৪.কম</news:name>
                                <news:language>bn</news:language>
                                </news:publication>
                                <news:publication_date>$timestamp</news:publication_date>
                                <news:title>$sHeading</news:title>
                                <news:keywords>$sCategoryNameBN</news:keywords>
                            </news:news>
                        </url>";
        }

        $sData .= '</urlset>';

        return response($sData)->header('Content-Type', 'text/xml');
    }

    public function contact() {
        // Latest contents
        $latestContents = BnHelperController::getLatestContent(4);

        return view('frontend.common.contact_us', compact('latestContents'));

    }

    public function searchContents(Request $request){
        $keyword = $request->q;
        if (is_null($request->q)){
            abort(404);
        }
        $contents = BnContent::query()
            ->with('category')
            ->select('content_id','cat_id', 'content_heading', 'content_sub_heading', 'content_details', 'img_bg_path', 'created_at', 'updated_at')
            ->where('content_heading', 'like', "%{$keyword}%")
            ->orWhere('content_sub_heading', 'like', "%{$keyword}%")
            ->orWhere('content_details', 'like', "%{$keyword}%")
            ->take(5)->get();
        return view('frontend.bn.search', compact('contents', 'keyword'));
    }

    public function searchLoadMore(Request $request)
    {
        $keyword = $request->q;
        $offset = $request->input('offset'); // the current offset of posts
        $limit = 5; // number of posts to load on each click

        // Fetch the next 10 posts
        $posts = BnContent::with('category')
            ->select('content_id','cat_id', 'content_heading', 'content_sub_heading', 'content_details', 'img_bg_path', 'created_at', 'updated_at')
            ->where('content_heading', 'like', "%{$keyword}%")
            ->orWhere('content_sub_heading', 'like', "%{$keyword}%")
            ->orWhere('content_details', 'like', "%{$keyword}%")
            ->skip($offset)
            ->take($limit)
            ->orderBy('content_id', 'desc')
            ->where('status', 1)
            ->where('deletable', 1)
            ->get();

        // Check if there are more posts
        $hasMorePosts = BnContent::where('content_heading', 'like', "%{$keyword}%")
            ->orWhere('content_sub_heading', 'like', "%{$keyword}%")
            ->orWhere('content_details', 'like', "%{$keyword}%")->where('status', 1)->where('deletable', 1)->count() > ($offset + $limit);

        // Return posts as JSON response
        return response()->json([
            'posts' => $posts,
            'hasMorePosts' => $hasMorePosts,
        ]);
    }

    public function detailsPrint($cat_slug,$contentId){
        $content = BnContent::where(['content_id'=>$contentId,'deletable'=>1,'status'=>1])->first();
        $aAuthorSlugs = explode(',', $content->author_slugs);
        $sAuthorSlugs = "'" . implode("','",$aAuthorSlugs) . "'";

        $authors = BnAuthor::query()
            ->select(['author_name_bn', 'author_slug', 'img_path'])
            ->whereIn('author_slug', $aAuthorSlugs)
            ->where('deletable', 1)
            ->orderByRaw("FIELD(author_slug, $sAuthorSlugs)")
            ->get();
        $cancelUrl = url("/details/{$cat_slug}/{$contentId}");
        return view('frontend.bn.print.details',compact('content','authors','cancelUrl'));
    }

}

