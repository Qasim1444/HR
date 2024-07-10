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
                            <option value="{{ $employee->id }}" @if($employee->id == $jobshistory->employee_id) selected @endif>{{ $employee->name }}</option>
                        @endforeach
                    </select>
                    <div style="color: red;">{{ $errors->first('employee_id') }}</div>
                </div>


                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" name="start_date" value="{{ $jobshistory->start_date }}" class="form-control" required>
                    <div style="color: red;">{{ $errors->first('start_date') }}</div>
                </div>

                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" name="end_date" value="{{ $jobshistory->end_date }}" class="form-control">
                    <div style="color: red;">{{ $errors->first('end_date') }}</div>
                </div>

                <div class="form-group">
                    <label for="job_id">Job:</label>
                    <select name="job_id" class="form-control" required>
                        <option value="" selected disabled>Select Job</option>
                        @foreach($jobs as $job)
                            <option value="{{ $job->id }}" @if($job->id == $jobshistory->job_id) selected @endif>{{ $job->job_title }}</option>
                        @endforeach
                    </select>
                    <div style="color: red;">{{ $errors->first('job_id') }}</div>
                </div>

                <div class="form-group">
                    <label for="department_id">Department:</label>
                    <select name="department_id" class="form-control" required>
                        <option value="" selected disabled>Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" @if($department->id == $jobshistory->department_id) selected @endif>{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                    <div style="color: red;">{{ $errors->first('department_id') }}</div>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
