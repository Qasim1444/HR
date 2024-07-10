@extends('welcome')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Salary Information</h3>
        </div>
        @include('message')
        <div class="card-body">
            <form action="{{ route('JobGrade.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="grade_level">Grade Level:</label>
                    <input type="text" name="grade_level" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="lowest_salary">Lowest Salary:</label>
                    <input type="text" name="lowest_salary" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="highest_salary">Highest Salary:</label>
                    <input type="text" name="highest_salary" class="form-control" required>
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
                    <th>grade_level</th>
                    <th>lowest_salary</th>
                    <th>highest_salary</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($JobGrades as $JobGrade)
                    <tr>
                        <td>{{ $JobGrade->id }}</td>
                        <td>{{ $JobGrade->grade_level }}</td>
                        <td>{{ $JobGrade->lowest_salary }}</td>
                        <td>{{ $JobGrade->highest_salary }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('edit.JobGrades', $JobGrade->id) }}">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>

                            <a class="btn btn-danger btn-sm" href="{{ route('delete.JobGrades', $JobGrade->id) }}">
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
