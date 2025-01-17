<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    //

    public function index(){
        return view('home');
    }

    public function saveBooking(Request $request){
        // Store field data to into Var
            $pickup_location = $request['pickupLocation'];
            $drpoff_location = $request['dropoffLocation'];
            $date = $request['pickupDate'];
            $time = $request['pickupTime'];

        // Validate the data
        // $request->validate([
        //     'pickupLocation' => 'required',
        //     'dropoffLocation' =>'required',
        //     'pickupDate' =>'required',
        //     'pickupTime' =>'required',
        // ]);

        // Store textfield value into session
        session(['booking' => $request->only(['pickup_location','drpoff_location','date','time']),]);

        return redirect()->route('booking.user');
    }

    public function userPage(){
        return view('users');
    }

    public function saveUsers(Request $request){
        // store field data into Var
        $name = $request['userName'];
        $phone = $request['userPhone'];
        $email = $request['userEmail'];
        $nop = $request['userNOP'];

        // Validate the data
        // $request->validate([
        //     'userName' => 'required',
        //     'userPhone' => 'required',
        //     'userEmail' => 'required',
        //     'userNOP' => 'required|max:4',
        // ]);

        // Store field value into session
        $booking = session('booking');
        session(['booking'=> array_merge($booking, $request->only(['name','phone','email','nop']))]);

        return redirect()->route('booking.review');
    }

    public function reviewPage(){
        $booking = session('booking');
        return view('review',compact('booking'));
    }
}
