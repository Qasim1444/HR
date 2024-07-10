@extends('welcome')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Manager Information</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Include any error messages here if needed -->
                    @include('message')
                    <form action="{{ route('Managers.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputJobTitle">Manager_Name</label>
                                <input type="text" id="inputJobTitle" name="ManagerName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputMinSalary">Manager_Email</label>
                                <input type="text" id="inputMinSalary" name="ManagerEmail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputMaxSalary">Manager_Mobile</label>
                                <input type="text" id="inputMaxSalary" name="ManagerMobile" class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <input type="submit" value="Create new Manager" class="btn btn-success ">
            </div>
        </div>
        </form>
    </section>
    <div class="card">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Manager_Name</th>
                        <th>Manager_Email</th>
                        <th>Manager_Mobile</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Managers as $Manager)
                        <tr>
                            <td>{{$Manager->id}}</td>
                            <td>{{$Manager->ManagerName}}</td>
                            <td>{{$Manager->ManagerEmail}}</td>
                            <td>{{$Manager->ManagerMobile}}</td>
                            <td>
                                <!-- Add your edit and delete buttons with appropriate links/actions -->
                                <!-- Edit Button -->
                                <div style="display: flex; justify-content: space-between;">
                                    <!-- Edit Button -->
                                    <a class="btn btn-primary btn-sm" href="{{route('edit.Managers',$Manager->id)}}">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>


                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.Managers', $Manager->id) }}">
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
