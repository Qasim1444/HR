@extends('welcome')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Location</h2>
            </div>
            <div class="card-body">
@include('message')
                <form action="{{ route('Location.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="street_address">Street Address</label>
                        <input type="text" class="form-control" id="street_address" name="street_address" required>
                    </div>

                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>

                    <div class="form-group">
                        <label for="state_province">State/Province</label>
                        <input type="text" class="form-control" id="state_province" name="state_province" required>
                    </div>

                    <div class="form-group">
                        <label for="countries_id">Country</label>
                        <select class="form-control" id="countries_id" name="countries_id" required>
                            <option value="" disabled selected>Select a country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <div class="container mt-5">
                    <div class="card">
                        <div class="card-header">
                            Location
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(count($Locations) > 0)
                                    <table  class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>street_address</th>
                                            <th>postal_code</th>
                                            <th>City</th>
                                            <th>state_province</th>
                                            <th>country(countries_id)</th>
                                            <th>Update/Delete</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Locations as $data)
                                            <tr>
                                                <td>{{ $data['street_address'] }}</td>
                                                <td>{{ $data['postal_code'] }}</td>
                                                <td>{{ $data['city'] }}</td>
                                                <td>{{ $data['state_province'] }}</td>
                                                <td>{{ $data->getcountryName->country_name }}</td>
                                              <td>
                                                  <a class="btn btn-primary btn-sm" href="{{ route('edit.Location', $data->id) }}">
                                                      <i class="fas fa-pencil-alt"></i> Edit
                                                  </a>

                                                  <a class="btn btn-danger btn-sm" href="{{ route('delete.Location', $data->id) }}">
                                                      <i class="fas fa-trash"></i> Delete
                                                  </a>
                                              </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>No payroll data available.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
