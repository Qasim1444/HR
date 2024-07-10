@extends('welcome')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Edit Department</h2>
            </div>

            <div class="card-body">
                @include('message')
                <form action="{{ route('update.departments', $department->id) }}" method="post">
                    @csrf


                    <div class="form-group">
                        <label for="department_name">Department Name</label>
                        <input type="text" class="form-control" value="{{ $department->department_name }}" id="department_name" name="department_name" required>
                    </div>

                    <div class="form-group">
                        <label for="manager_id">Manager</label>
                        <select class="form-control" id="manager_id" name="manager_id" required>
                            <option value="" disabled>Select a manager</option>
                            @foreach($managers as $manager)
                                <option value="{{ $manager->id }}" @if($manager->id == $department->manager_id) selected @endif>
                                    {{ $manager->ManagerName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="location_id">Location</label>
                        <select class="form-control" id="location_id" name="location_id" required>
                            <option value="" disabled>Select a location</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}" @if($location->id == $department->location_id) selected @endif>
                                    {{ $location->city }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Department</button>
                </form>
            </div>
        </div>
    </div>

@endsection
