@extends('welcome')

@section('content')




<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Add Country</h2>
        </div>

        <div class="card-body">
@include('message')
            <form action="{{ route('countries.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="country_name">Country Name</label>
                    <input type="text" class="form-control" id="country_name" name="country_name" required>
                </div>

                <div class="form-group">
                    <label for="countries_id">Regions(Regions ID)</label>
                    <select class="form-control" id="regions_id" name="regions_id" required>
                        <option value="" disabled selected>Select a Regions</option>
                        @foreach($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->regionname }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>



            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Country Name</th>

                    <th>Region Name</th> <!-- Add this column -->
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($countries as $country)
                    <tr>
                        <td>{{ $country->id }}</td>
                        <td>{{ $country->country_name }}</td>
                        <td>{{ $country->getregionsName->regionname }}</td>

                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('edit.countries', $country->id) }}">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>

                            <a class="btn btn-danger btn-sm" href="{{ route('delete.countries', $country->id) }}">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
