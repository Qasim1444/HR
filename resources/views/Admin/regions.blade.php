@extends('welcome')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Create Region</h5>
            </div>

            @include('message')
            <div class="card-body">
                <form method="post" action="{{ route('regions.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="region">Region Name</label>
                        <input type="text" class="form-control" id="region" name="regionname" required>
                    </div>

                    <button type="submit" class="btn btn-primary mb-5">Create Region</button>
                </form>

                <div class="container mt-5">
                    <div class="card">
                        <div class="card-header">
                           Region Data Table
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(count($regions) > 0)
                                    <table  class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th> ID</th>
                                            <th>Region Name</th>
                                            <th>Update/Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($regions as $data)
                                            <tr>
                                                <td>{{ $data['id'] }}</td>
                                                <td>{{ $data['regionname'] }}</td>
<td>
    <a class="btn btn-primary btn-sm" href="{{route('edit.regions',$data->id)}}">
        <i class="fas fa-pencil-alt"></i> Edit
    </a>


    <a class="btn btn-danger btn-sm" href="{{ route('delete.regions', $data->id) }}">
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
