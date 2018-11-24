<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::with('photos')->get();
        
        return view('home', compact('rooms'));
    }
}
