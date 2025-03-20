@extends('frontend.bn.app')

@section('title')
   Page Not Found
@endsection

@section('mainContent')
    <div class="news_container">
        <div class="h-screen flex flex-col gap-2 items-center justify-center">
                <h2 class="text-4xl dark:text-slate-300">দু:খিত পাওয়া যায়নি!</h2>
                <p class="text-xl dark:text-slate-300">সর্বশেষ খবর জানতে ক্লিক করুন</p>
                <a href="{{ url('/latest/news') }}" class="bg-base-color py-1 px-4 rounded text-slate-300">সর্বশেষ খবর</a>
        </div>
    </div>

@endsection

