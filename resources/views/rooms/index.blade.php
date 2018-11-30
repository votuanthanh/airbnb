@extends('layouts.app')

@section('title')Your listings @endsection

@section('content')

    <div class="row">
        <div class="col-md-3">
            <ul class="sidebar-list">
                <li class="sidebar-item active"><a href="{{ route('rooms.index') }}">Room List</a></li>
                <li class="sidebar-item"><a href="{{ route('your-reservations') }}">Bookings</a></li>
                <li class="sidebar-item"><a href="{{ route('your-trips') }}">Trips</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Room List
                </div>
                <div class="panel-body">

                    @foreach($rooms as $room)
                        @php
                            $image = $room->photos()->first();
                            $fileName = $image ? $image->name : 'default.jpg';
                        @endphp
                        <div class="row">
                            <div class="col-md-2">
                                <img class="img-responsive" src="{{ asset("images/rooms/".$fileName) }}">
                            </div>
                            <div class="col-md-6">
                                <h4>{{ $room->listing_name }}</h4>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('rooms.edit', ['id' => $room->id]) }}" class="btn btn-primary">Update</a>
                            </div>
                            <div class="col-md-2 right">
                                <a href="{{ route('room_delete', ['id' => $room->id]) }}" class="btn btn-primary" style="background: red;">Delete</a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection