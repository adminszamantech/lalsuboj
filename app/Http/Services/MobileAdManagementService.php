<?php


namespace App\Http\Services;

use App\Models\BnMobileAd;

class MobileAdManagementService
{
    public function getAllAds()
    {
        // Fetch all ads from the database
        $allAds = BnMobileAd::query()
            ->select(['id', 'type', 'page', 'position', 'dfp_header_code', 'code', 'mobile_image_path', 'external_link', 'start_time', 'end_time'])
            ->where('status', 1)
            ->where('deletable', 1)
            ->get();

        // Return the ads grouped by pages
        return [
            'commonAds' => $allAds->where('page', 1),
            'homePageAds' => $allAds->where('page', 2),
            'categoryPageAds' => $allAds->where('page', 3),
            'detailsPageAds' => $allAds->where('page', 4),
            'dfpHeaderCode' => $allAds->where('type', 1)->pluck('dfp_header_code'),
        ];
    }
}
