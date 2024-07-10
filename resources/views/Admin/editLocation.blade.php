@extends('welcome')

@section('content')

    @include('message')

    <form action="{{ route('update.Location', $Locations->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="street_address">Street Address</label>
            <input type="text" class="form-control" value="{{ $Locations->first()->street_address }}" id="street_address" name="street_address" required>
        </div>

        <div class="form-group">
            <label for="postal_code">Postal Code</label>
            <input type="text" class="form-control" value="{{ $Locations->first()->postal_code }}" id="postal_code" name="postal_code" required>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" value="{{ $Locations->first()->city }}" id="city" name="city" required>
        </div>

        <div class="form-group">
            <label for="state_province">State/Province</label>
            <input type="text" class="form-control" value="{{ $Locations->first()->state_province }}" id="state_province" name="state_province" required>
        </div>

        <div class="form-group">
            <label for="countries_id">Country</label>
            <select class="form-control" id="countries_id" name="countries_id" required>
                <option value="" disabled>Select a country</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" @if($country->id == $Locations->countries_id) selected @endif>{{ $country->country_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
