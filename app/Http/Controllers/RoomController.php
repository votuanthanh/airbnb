<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomCreateRequest;
use App\Photo;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use File;

class RoomController extends Controller
{
    private $room, $photo;

    function __construct(Room $room, Photo $photo)
    {
        $this->room = $room;
        $this->photo = $photo;
    }

    public function index()
    {
        $rooms = Auth::user()->rooms()->with('photos')->get();

        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(RoomCreateRequest $request)
    {
        try {
            $this->room->user_id = Auth::id();
            $this->room->home_type = $request->home_type;
            $this->room->room_type = $request->room_type;
            $this->room->accommodate = $request->accommodate;
            $this->room->bed_room = $request->bed_room;
            $this->room->bath_room = $request->bath_room;
            $this->room->listing_name = $request->listing_name;
            $this->room->slug = str_slug($request->listing_name);
            $this->room->summary = $request->summary;
            $this->room->address = $request->address;
            $this->room->is_tv = $request->get('is_tv') ? true : false;
            $this->room->address = $request->address;
            $this->room->is_kitchen = $request->is_kitchen ? true : false;
            $this->room->is_heating = $request->is_heating ? true : false;
            $this->room->is_internet = $request->is_internet ? true : false;
            $this->room->is_air = $request->is_air ? true : false;
            $this->room->active = $request->active ? true : false;
            $this->room->price = $request->price;

            if ($request->images) {
                $this->room->save();
                $room_id = $this->room->id;
                foreach ($request->images as $image) {
                    $filename = $image->getClientOriginalName();
                    $location = public_path('images/rooms/' . $filename);
                    Image::make($image)->resize(800, 400)->save($location);
                    $photo = new Photo;
                    $photo->name = $filename;
                    $photo->room_id = $room_id;
                    $photo->save();
                }
            }

            return redirect('/');
        } catch (Exception $e) {
            \Log::info($e);
        }
    }

    public function show($id)
    {
        $room = Room::with('user', 'photos')->where('id', $id)->first();

        return view('rooms.show', compact('room'));
    }

    public function edit($id)
    {
        $room = Room::with('user', 'photos')->where('id', $id)->first();
                
        return view('rooms.update', compact('room'));
    }

    public function update($id, Request $request)
    {
        //dd($request->all());
        $this->room = Room::find($id);

        try {
            $this->room->user_id = Auth::id();
            $this->room->home_type = $request->home_type;
            $this->room->room_type = $request->room_type;
            $this->room->accommodate = $request->accommodate;
            $this->room->bed_room = $request->bed_room;
            $this->room->bath_room = $request->bath_room;
            $this->room->listing_name = $request->listing_name;
            $this->room->slug = str_slug($request->listing_name);
            $this->room->summary = $request->summary;
            $this->room->address = $request->address;
            $this->room->is_tv = $request->get('is_tv') ? true : false;
            $this->room->address = $request->address;
            $this->room->is_kitchen = $request->is_kitchen ? true : false;
            $this->room->is_heating = $request->is_heating ? true : false;
            $this->room->is_internet = $request->is_internet ? true : false;
            $this->room->is_air = $request->is_air ? true : false;
            $this->room->active = $request->active ? true : false;
            $this->room->price = $request->price;

            $this->room->save();
            
            if ($request->images) {
                $room_id = $this->room->id;
                foreach ($this->room->photos as $photo) {
                    $filename = $photo->name;
                    File::delete(public_path('images\\rooms\\'. $filename));
                    $photo->delete();
                }
                // $this->room->photos()->delete();


                foreach ($request->images as $image) {
                    $filename = $image->getClientOriginalName();
                    $location = public_path('images/rooms/' . $filename);
                    Image::make($image)->resize(800, 400)->save($location);
                    $photo = new Photo;
                    $photo->name = $filename;
                    $photo->room_id = $room_id;
                    $photo->save();
                }
            }

            return redirect('/');
        } catch (Exception $e) {
            dd('There are some erros happening in the update process! ');
            \Log::info($e);
        }
    }

    public function room_delete($id)
    {
        $room = Room::with('user', 'photos')->where('id', $id)->first();
        $room->delete();
                
        return redirect('/rooms');
    }
}


