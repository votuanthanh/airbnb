@extends('layouts.app')

@section('title')Your Reservations @endsection

@section('content')

    <div class="row">
        <div class="col-md-3">
            <ul class="sidebar-list">
                <li class="sidebar-item"><a href="{{ route('rooms.index') }}">Room List</a></li>
                <li class="sidebar-item">
                    <a href="{{ route('your-reservations') }}" class=" sidebar-link active">Bookings</a>
                </li>
                <li class="sidebar-item"><a href="{{ route('your-trips') }}">Trips</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Your Bookings
                </div>
                <div class="panel-body">

                    @foreach($rooms as $room)
                        @foreach($room->reservations as $reservation)
                            <div class="row">
                                <div class="col-md-3">
                                    {{ \Carbon\Carbon::parse($reservation->start_date)->diffForHumans() }}
                                </div>
                                <div class="col-md-3">
                                    <img class="img-responsive" style="width: 150px" src="{{ asset("images/rooms/".$reservation->room->photos[0]->name) }}">
                                </div>
                                <div class="col-md-2">
                                    <a href="">
                                        <img src="{{ asset('/images/avatar.jpg') }}" class="icon" alt="">
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <h4>${{ $reservation->total }}</h4>
                                </div>
                                <div class="col-md-2 right">
                                    <a href="{{ route('reservations.destroy', ['id'=>$reservation->id]) }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection