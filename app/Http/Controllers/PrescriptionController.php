<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Prescription;
use App\Models\Medicine;
use App\Models\Test;

class PrescriptionController extends Controller
{
    public function index() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $bookings = Booking::where('date', date('Y-m-d'))->where('status', 1)->where('doctor_id', auth()->user()->id)->get();
        return view('prescription.index', compact('bookings'));
    }

    public function store(Request $request) {
        $data = $request->all();
        $data['medicine'] = implode(', ',$request->medicine);
        Prescription::create($data);
        return redirect()->back()->with('message', 'Prescription created.');

    }

    public function show($userId, $date) {
        $prescription = Prescription::where('user_id', $userId)->where('date', $date)->first();
        return view('prescription.show', compact('prescription'));
    }

    //get all patients from prescription table
    public function patientsFromPrescription() {
        $patients = Prescription::get();
       
        return view('prescription.all', compact('patients'));
    }

    public function medicine(Request $request) {
        $medicines = Medicine::all();
        return $medicines;
    }

    public function updateStatusTest($idTest) {
        $booking = Booking::find($idTest);
        $booking->test_status = 1;
        $booking->save();
        return redirect()->back();
    }

    public function showTest($bookingId) {
        $test = Test::where('id_booking', $bookingId)->first();
        return view('prescription.show_test', compact('test'));

    }


}
