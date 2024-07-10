

@extends('welcome')
@section('content')



        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Employee </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    @include('message')
                    <form action="{{ route('addemployee.post') }}"
                          method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName"> Name</label>
                                <input type="text" id="inputName" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Last_Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control"
                                       rows="4">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Hire_Date</label>
                                <input type="date" id="inputDescription" name="hire_date" class="form-control"
                                       rows="4">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Department</label>
                                <select name="department_id" id="department_id" class="form-control p_input">
                                    <option value="" disabled selected>Select a Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputClientCompany">Salary</label>
                                <input type="text" id="inputClientCompany" name="salary" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">Commission_Pct</label>
                                <input type="text" id="inputProjectLeader" name="commission_pct" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">Email</label>
                                <input type="email" name="email" id="inputProjectLeader" name="email"
                                       class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Form</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEstimatedBudget">Phone</label>
                            <input type="number" id="inputEstimatedBudget" name="phone" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="inputEstimatedDuration">Address</label>
                            <textarea id="inputEstimatedDuration" name="address" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Role</label>
                            <select name="role" id="role" class="form-control p_input">
                                <option value="0">Staff</option>
                                <option value="1">Admin</option>
                                <!-- Add more options based on your needs -->
                            </select>
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
                        <div class="form-group">
                            <label for="inputStatus">Job</label>
                            <select name="job_id" id="job_id" class="form-control p_input">
                                <option value="" selected disabled>Select Job</option>
                                @foreach($jobs as $job)
                                    <option value="{{ $job->id }}">{{ $job->job_title }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <input type="submit" value="Create new Employee" class="btn btn-success float-right">
            </div>
        </div>
        </form>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Projects</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Search Employees</h3>

                    <div class="card-body">

                        <div>
                            <form action="{{url('search')}}" method="get">

                                <input type="text" name="search" class="form-control" placeholder="Search for something">
                                <input type="submit" value="Search" name="" class="btn btn-primary">

                            </form>
                        </div>



                    </div>
                </div>

                <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Hire Date</th>
                            <th>Job</th>
                            <th>Salary</th>
                            <th>Commission Pct</th>
                            <th>Manager</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Loaction</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>

                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->hire_date }}</td>
                                <td>{{ optional($employee->getjob)->job_title }}</td>

                                <td>{{ $employee->salary }}</td>
                                <td>{{ $employee->commission_pct }}</td>
                                <td>
                                    {{ optional($employee->manager)->ManagerName }}
                                </td>
                                <td>{{ optional($employee->department)->department_name }}</td>

                                <td>{{ $employee->email }}</td>
                                <td>{{ !empty($employee->role) ? 'Admin' : 'Staff' }}</td>
                                <td>{{ optional($employee->location)->city }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->address }}</td>


                            <td>

                                    <div style="display: flex; justify-content: space-between;">
                                        <!-- Edit Button -->
                                        <a class="btn btn-primary btn-sm" href="{{ route('edit.employee',$employee->id) }}">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>

                                        <a class="btn btn-danger btn-sm" href="{{ route('delete.employee', $employee->id) }}">
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
        <!-- /.card -->

    </section>
@endsection
