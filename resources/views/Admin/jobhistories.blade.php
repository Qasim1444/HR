@extends('welcome')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Job Information</h3>
        </div>
        @include('message')
        <div class="card-body">
            <form action="{{ route('jobshistory.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="employee_id">Employee:</label>
                    <select name="employee_id" class="form-control" required>
                        <option value="" selected disabled>Select Employee</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                    <div style="color: red;">{{ $errors->first('employee_id') }}</div>
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" name="start_date" class="form-control" required>
                    <div style="color: red;">{{ $errors->first('start_date') }}</div>
                </div>

                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" name="end_date" class="form-control">
                    <div style="color: red;">{{ $errors->first('end_date') }}</div>
                </div>

                <div class="form-group">
                    <label for="job_id">Job:</label>
                    <select name="job_id" class="form-control" required>
                        <option value="" selected disabled>Select Job</option>
                        @foreach($jobs as $job)
                            <option value="{{ $job->id }}">{{ $job->job_title }}</option>
                        @endforeach
                    </select>
                    <div style="color: red;">{{ $errors->first('job_id') }}</div>
                </div>

                <div class="form-group">
                    <label for="department_id">Department:</label>
                    <select name="department_id" class="form-control" required>
                        <option value="" selected disabled>Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                    <div style="color: red;">{{ $errors->first('department_id') }}</div>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>employee_id</th>
                    <th>start_date</th>
                    <th>end_date</th>
                    <th>job(job_id)</th>
                    <th>Department(department_id)</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jobshistorys as $jobshistory)
                    <tr>
                        <td>{{ $jobshistory->id }}</td>
                        <td>{{ $jobshistory->employee_id }}</td>
                        <td>{{ $jobshistory->start_date }}</td>
                        <td>{{ $jobshistory->end_date }}</td>
                        <td>{{ $jobshistory->getjobName->job_title }}</td>
                        <td>{{ $jobshistory->getdepartmentName->department_name	 }}</td>
                        <td>
                            <!-- Add your edit and delete buttons with appropriate links/actions -->
                            <a class="btn btn-primary btn-sm" href="{{route('edit.jobshistory',$jobshistory->id)}}">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>



                            <a class="btn btn-danger btn-sm" href="{{ route('delete.jobshistory', $jobshistory->id) }}">
                                <i class="fas fa-trash"></i> Delete
                            </a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
