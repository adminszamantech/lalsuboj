<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\Photo\PhotoHelperController;
use App\Http\Controllers\Controller;
use App\Models\PhotoAlbum;
use App\Models\PhotoCategory;
use App\Http\Services\AdManagementService;
use App\Http\Services\MobileAdManagementService;

class PhotoFrontendController extends Controller
{

    public function index()
    {
        // Photo Gallery
        $photoAlbums = PhotoHelperController::getPositionContent(1, null);

        // Bangladesh Album
        $bangladeshAlbums = PhotoHelperController::getCategoryAlbum(1, 9);

        // Entertainment Album
        $entertainmentAlbums = PhotoHelperController::getCategoryAlbum(3, 6);

        // Sports Album
        $sportsAlbums = PhotoHelperController::getCategoryAlbum(2, 8);


        // Lifestyle Album
        $lifestyleAlbums = PhotoHelperController::getCategoryAlbum(7, 9);

        // International Album
        $internationalAlbums = PhotoHelperController::getCategoryAlbum(4, 6);


        // Technology Album
        $technologyAlbums = PhotoHelperController::getCategoryAlbum(5, 9);

        // Travelling Album
        $travelAlbums = PhotoHelperController::getCategoryAlbum(6, 6);

        // Other Album
        $otherAlbums = PhotoHelperController::getCategoryAlbum(8, 8);



        return view('frontend.photo.home', compact('photoAlbums', 'bangladeshAlbums', 'entertainmentAlbums', 'sportsAlbums', 'lifestyleAlbums', 'internationalAlbums', 'technologyAlbums', 'travelAlbums', 'otherAlbums'));
    }

    public function category($cat_slug)
    {
        $category = PhotoCategory::where('cat_slug', $cat_slug)->where('status', 1)->where('deletable', 1)->first();

        if(is_null($category)){
            abort(404);
        }

        $categoryAlbums = PhotoHelperController::getCategoryAlbum($category->cat_id, 12, true);

        return view('frontend.photo.category', compact('categoryAlbums', 'category'));
    }

    //    public function subcategory()
//    {
//        return view('frontend.photo.subcategory');
//    }

    public function details($cat_slug, $sub_cat_slug, $album_id)
    {
        // Desktop Ads
        $adService = new AdManagementService();
        $ads = $adService->getAllAds();

        // Mobile Ads
        $mobileAdsService = new MobileAdManagementService();
        $mobileAds = $mobileAdsService->getAllAds();

        if (!is_numeric($album_id)) abort(404);

        $detailAlbum = PhotoAlbum::with(['category'])->where('album_id', $album_id)->where('deletable', 1)->first();
        if (!$detailAlbum) abort(404);

        $moreAlbums = PhotoAlbum::with('category')
                                 ->where('cat_id', $detailAlbum->cat_id)
                                 ->where('album_id', '<>', $album_id)
                                 ->where('deletable', 1)
                                 ->latest()
                                 ->take(8)
                                 ->get();

        return view('frontend.photo.details', compact('detailAlbum', 'moreAlbums', 'ads', 'mobileAds'));
    }

}

