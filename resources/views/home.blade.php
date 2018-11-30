@extends('layouts.app')

@section('title')Home @endsection

@section('content')
    <div class="container">
        <div class="row">
            <form action="">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" placeholder="Destination" class="form-control" name="search">
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="reservation_start_date" placeholder="Start Date" class="form-control" name="start_date">
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="reservation_end_date" placeholder="End Date" class="form-control" name="end_date">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-primary" value="Search">
                    </div>
                </div>
            </form>

            <hr>

            <div class="text-center">
                <h2>Book accommodations and unique experience</h2>
                <p>Discover new and inspiring places around the world.</p>
            </div>

            <br>

            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <a href="#">
                        <div class="discovery-card" style="background-image: url({{ asset('/images/New_York.jpeg') }})">
                            <div class="va-container">
                                <div class="va-middle text-center">
                                    <h2><strong>New York</strong></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="">
                        <div class="discovery-card" style="background-image: url({{ asset('/images/San_Francisco.jpeg') }})">
                            <div class="va-container">
                                <div class="va-middle text-center">
                                    <h2><strong>San Francisco</strong></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="">
                        <div class="discovery-card" style="background-image: url({{ asset('/images/Chicago.jpeg') }})">
                            <div class="va-container">
                                <div class="va-middle text-center">
                                    <h2><strong>Chicago</strong></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-12">
                    <br>
                    <hr>

                    <div class="text-center">
                        <h2>Explore the world</h2>
                        <p>See where people are travelling, all around the world.</p>
                    </div>
                    <br>
                </div>
                

                <br>

                <div class="row">
                    <hr>
                    @foreach($rooms as $room)
                        @php
                            $image = $room->photos()->first();
                            $fileName = $image ? $image->name : 'default.jpg';
                        @endphp
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading preview">
                                    <img src="{{ asset("images/rooms/".$fileName) }}">
                                </div>
                                <div class="panel-body">
                                    <img src="{{ asset('/images/avatar.jpg') }}" class="icon" alt="">
                                    <a href="{{ route('rooms.show', ['id' => $room]) }}">  {{ $room->listing_name }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
    <script>
        $(function () {
            $('#reservation_start_date').datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                maxDate: '3m',
                onSelect: function (selected) {
                    $('#reservation_end_date').datepicker("option", "minDate", selected);
                }
            });

            $('#reservation_end_date').datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                maxDate: '3m',
                onSelect: function (selected) {
                    $('#reservation_start_date').datepicker("option", "maxDate", selected);
                }
            });
        })
    </script>
@endsection
