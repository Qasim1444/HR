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
            <form action="{{ route('update.Jobs',$jobs->id) }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputJobTitle">Job Title</label>
                        <input type="text" id="inputJobTitle" value="{{ $jobs->job_title}}"  name="job_title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputMinSalary">Minimum Salary</label>
                        <input type="text" id="inputMinSalary" value="{{ $jobs->min_salary}}" name="min_salary" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputMaxSalary">Maximum Salary</label>
                        <input type="text" id="inputMaxSalary" value="{{ $jobs->max_salary}}" name="max_salary" class="form-control">
                    </div>
                </div>
                <!-- /.card-body -->

                <!-- /.card -->


                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Update Job" class="btn btn-success ">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
