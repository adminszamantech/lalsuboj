<?php


namespace App\Http\Services;

use App\Models\BnAd;

class AdManagementService
{

    public function getAllAds()
    {
        $allAds = BnAd::query()
            ->select(['id', 'type', 'page', 'position', 'dfp_header_code', 'code', 'desktop_image_path', 'mobile_image_path', 'external_link', 'start_time', 'end_time'])
            ->where('status', 1)
            ->where('deletable', 1)
            ->get();

        // 1 = Common, 2 = Home Page, 3 = Category Page, 4 = Details Page
        $commonAds = $allAds->where('page', 1);
        $homePageAds = $allAds->where('page', 2);
        $categoryPageAds = $allAds->where('page', 3);
        $detailsPageAds = $allAds->where('page', 4);

        // DFP header code - 1=DFP, 2=Code, 3=Image
        $dfpHeaderCode = $allAds->where('type', 1)->pluck('dfp_header_code');

        return [
            'commonAds' => $commonAds,
            'homePageAds' => $homePageAds,
            'categoryPageAds' => $categoryPageAds,
            'detailsPageAds' => $detailsPageAds,
            'dfpHeaderCode' => $dfpHeaderCode,
        ];
    }

}
