@extends('layouts.app')

@section('title')Update room @endsection

@section('content')
    @php
        $homeTypeArr = [
            'Apartment' => 'Apartment',
            'House' => 'House',
            'Bed & Breakfast' => 'Bed & Breakfast',
        ];

        $roomTypeArr = [
            'Entire' => 'Entire',
            'Private' => 'Private',
            'Shared' => 'Shared',
        ];

        $accommodateArr = [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6+' => '6+',
        ];

        $bedroomArr = [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4+' => '4+',
        ];

        $bathroomArr = [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4+' => '4+',
        ];
    @endphp

    <div class="panel panel-primary">
        <div class="panel-heading">
            Create your beautiful place
        </div>
        <div class="panel-body">
            <form action="{{ route('rooms.update', ['id' => $room->id]) }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-4 select">
                        <div class="form-group">
                            <label for="home_type">Home Type</label>
                            <select id="home_type" class="form-control" name="home_type" required>
                                @foreach($homeTypeArr as $keyHomeType => $itemHomeType)
                                    @php
                                        $selected = $room->home_type == $keyHomeType ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $keyHomeType }}" {{ $selected }}>{{ $itemHomeType }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 select">
                        <div class="form-group">
                            <label id="room_type">Room Type</label>
                            <select required id="room_type" class="form-control" name="room_type">
                                @foreach($roomTypeArr as $keyRoomType => $itemRoomType)
                                    @php
                                        $selected = $room->room_type == $keyRoomType ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $keyRoomType }}" {{ $selected }}>{{ $itemRoomType }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 select">
                        <div class="form-group">
                            <label for="accommodate">Accommodate</label>
                            <select required id="accommodate" name="accommodate" class="form-control">
                                @foreach($accommodateArr as $keyAccommodate => $itemAccommodate)
                                    @php
                                        $selected = $room->accommodate == $keyAccommodate ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $keyAccommodate }}" {{ $selected }}>{{ $itemAccommodate }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 select">
                        <div class="form-group">
                            <label for="bed_room">Bedrooms</label>
                            <select required id="bed_room" name="bed_room" class="form-control">
                                @foreach($bedroomArr as $keyBedroom => $itemBedroom)
                                    @php
                                        $selected = $room->bedroom == $keyBedroom ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $keyBedroom }}" {{ $selected }}>{{ $itemBedroom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 select">
                        <div class="form-group">
                            <label for="bath_room">Bathrooms</label>
                            <select required id="bath_room" name="bath_room" class="form-control">
                                @foreach($bathroomArr as $keyBathroom => $itemBathroom)
                                    @php
                                        $selected = $room->bathroom == $keyBathroom ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $keyBathroom }}" {{ $selected }}>{{ $itemBathroom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="listing_name">Listing name</label>
                            <textarea required id="listing_name" name="listing_name" class="form-control"
                                      placeholder="Be clear and descriptive">{{ $room->listing_name }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="summary">Summary</label>
                            <textarea required id="summary" name="summary" class="form-control"
                                      placeholder="Tell about your house">{{ $room->summary }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea required id="address" name="address" class="form-control"
                                      placeholder="What is your address?">{{ $room->address }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="checkbox" name="is_tv" {{ $room->is_tv ? 'checked' : '' }}> TV
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="is_kitchen" {{ $room->is_kitchen ? 'checked' : '' }}> Kitchen
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="is_internet" {{ $room->is_internet ? 'checked' : '' }}> Internet
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="checkbox" name="is_heating" {{ $room->is_heating ? 'checked' : '' }}> Heating
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="is_air" {{ $room->is_air ? 'checked' : '' }}> Air Conditioning
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nightly Price</label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="number" min="10" name="price" class="form-control" value="{{ $room->price }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <span class="btn btn-default btn-file">
                                <i class="fa fa-cloud-upload fa-lg"></i> Change New Photos
                                <input type="file" name="images[]" multiple="multiple">
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="checkbox" name="active"  {{ $room->active==1 ? 'checked' : '' }}> Active
                        </div>
                    </div>
                </div>

                <div class="actions">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>

            </form>
        </div>
    </div>
@endsection