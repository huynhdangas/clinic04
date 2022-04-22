<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Prescription;
use App\Models\Medicine;
use App\Models\Test;

class TestController extends Controller
{
    public function index() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $bookings = Booking::where('test_status', 1)->get();
        return view('test.index', compact('bookings'));
    }

    public function store(Request $request) {
        $data = $request->all();
        Test::create($data);
        return redirect()->back()->with('message', 'Test result created.');

    }

    public function show($bookingId) {
        $test = Test::where('id_booking', $bookingId)->first();
        return view('test.show', compact('test'));
    }



}
