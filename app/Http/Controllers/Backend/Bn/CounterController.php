<?php

namespace App\Http\Controllers\Backend\Bn;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Carbon\Traits\Date;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index(){

        $counter = Counter::find(1);

        return view('backend.counter.index', compact('counter'));

    }

    public function update(Request $request){

        $date = date("M d, Y", strtotime($request->date));
        $counter_time = $date." ".$request->time.":00";
        Counter::find(1)->update([
            'counter_name' => $request->counter_name,
            'counter_time' => $counter_time,
            'time' => $request->time,
            'date' => $date,
            'status' => $request->status
        ]);

        return redirect()->back()->with('successMsg', 'Counter updated successfully!');

    }

}
