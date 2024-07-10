@extends('welcome')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Job Information</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Include any error messages here if needed -->
                @include('message')
                <form action="{{ route('jobs.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputJobTitle">Job Title</label>
                            <input type="text" id="inputJobTitle" name="job_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputMinSalary">Minimum Salary</label>
                            <input type="text" id="inputMinSalary" name="min_salary" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputMaxSalary">Maximum Salary</label>
                            <input type="text" id="inputMaxSalary" name="max_salary" class="form-control">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <!-- /.card -->


                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Create new Job" class="btn btn-success ">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="card">
        <div class="card-body p-0">


            <div class="table-responsive">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Job Title</th>
                        <th>Min Salary</th>
                        <th>Max Salary</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{$job->id}}</td>
                            <td>{{$job->job_title}}</td>
                            <td>{{$job->min_salary}}</td>
                            <td>{{$job->max_salary}}</td>
                            <td>
                                <!-- Add your edit and delete buttons with appropriate links/actions -->
                                <!-- Edit Button -->
                                <div style="display: flex; justify-content: space-between;">

                                    <a class="btn btn-primary btn-sm" href="{{route('edit.Jobs',$job->id)}}">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>


                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.Jobs', $job->id) }}">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
@endsection
