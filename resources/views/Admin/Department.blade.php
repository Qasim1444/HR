@extends('welcome')
@section('content')


    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Create Department</h5>
            </div>
            @include('message')
            <div class="card-body">
                <form method="post" action="{{ route('departments.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="department_name">Department Name</label>
                        <input type="text" class="form-control" id="department_name" name="department_name" required>
                    </div>
                    <div class="form-group">
                        <label for="countries_id"> Manager (Manager ID) </label>
                        <select class="form-control" id="manager_id" name="manager_id" required>
                            <option value="" disabled selected>Select a Manager</option>
                            @foreach($Managers as $Manager)
                                <option value="{{ $Manager->id }}">{{ $Manager->ManagerName}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="countries_id"> Location (Location ID) </label>
                        <select class="form-control" id="location_id" name="location_id" required>
                            <option value="" disabled selected>Select a Location</option>
                            @foreach($Locations as $Location)
                                <option value="{{ $Location->id }}">{{ $Location->city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Department</button>
                </form>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Department Name</th>
                                <th>Manager ID</th>
                                <th>Location ID</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{ $department->id }}</td>
                                    <td>{{ $department->department_name }}</td>
                                    <td>{{ $department->getmanagerName->ManagerName }}</td>
                                    <td>{{ $department->getlocationName->city }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{route('edit.departments',$department->id)}}">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>


                                        <a class="btn btn-danger btn-sm" href="{{ route('delete.departments', $department->id) }}">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </div>
        </div>
    </div>


@endsection
