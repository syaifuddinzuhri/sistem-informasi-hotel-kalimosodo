<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home()
    {
        Session::put('nav', 1);
        $rooms = Room::with('room_type')->where('is_active', 1)->latest()->limit(5)->get();
        $roomType = RoomType::where('is_active', 1)->get();
        return view('user.home', compact('roomType', 'rooms'));
    }

    public function blog()
    {
        Session::put('nav', 2);
        return view('user.blog');
    }

    public function room()
    {
        Session::put('nav', 3);
        $rooms = Room::with('room_type')->where('is_active', 1)->paginate(3);
        return view('user.room', compact('rooms'));
    }

    public function detailRoom($id)
    {
        Session::put('nav', 3);
        $room = Room::with('room_type', 'room_has_facility')->findOrFail($id);
        return view('user.detail-room', compact('room'));
    }

    public function facility()
    {
        Session::put('nav', 4);
        $facility = Facility::where('is_active', 1)->get();
        return view('user.facility', compact('facility'));
    }

    public function about()
    {
        Session::put('nav', 5);
        return view('user.about');
    }

    public function contact()
    {
        Session::put('nav', 6);
        return view('user.contact');
    }
}