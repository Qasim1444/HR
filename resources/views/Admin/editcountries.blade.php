@extends('welcome')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Update Country</h2>
            </div>

            <div class="card-body">
                @include('message')
                <form action="{{ route('update.countries', $countries->id) }}" method="post">
                    @csrf


                    <div class="form-group">
                        <label for="country_name">Country Name</label>
                        <input type="text" class="form-control" value="{{ $countries->country_name }}" id="country_name" name="country_name" required>
                    </div>

                    <div class="form-group">
                        <label for="regions_id">Regions (Region ID)</label>
                        <select class="form-control" id="regions_id" name="regions_id" required>
                            <option value="" disabled>Select a Region</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}" @if($region->id == $countries->regions_id) selected @endif>{{ $region->regionname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
