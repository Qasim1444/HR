@extends('welcome')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Update JobGrade</h2>
            </div>

            <div class="card-body">
                @include('message')
                <form action="{{ route('update.JobGrades', $JobGrade->id) }}" method="post">
                    @csrf


                    <div class="form-group">
                        <label for="grade_level">Grade Level</label>
                        <input type="text" class="form-control" value="{{ $JobGrade->grade_level }}" id="grade_level" name="grade_level" required>
                    </div>

                    <div class="form-group">
                        <label for="lowest_salary">Lowest Salary</label>
                        <input type="text" class="form-control" value="{{ $JobGrade->lowest_salary }}" id="lowest_salary" name="lowest_salary" required>
                    </div>

                    <div class="form-group">
                        <label for="highest_salary">Highest Salary</label>
                        <input type="text" class="form-control" value="{{ $JobGrade->highest_salary }}" id="highest_salary" name="highest_salary" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update JobGrade</button>
                </form>
            </div>
        </div>
    </div>

@endsection
