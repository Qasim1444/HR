@extends('welcome')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Employee</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    @include('message')
                    <form action="{{ route('update.employee',$employee->id) }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" id="inputName" value="{{ old('name', $employee->name) }}" name="name"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $employee->last_name) }}" class="form-control" value="{{ old('last_name') }}"
                                       rows="4">
                            </div>
                            <div class="form-group">
                                <label for="hire_date">Hire Date</label>
                                <input type="date" id="hire_date" name="hire_date" value="{{ old('hire_date', $employee->hire_date) }}" class="form-control" value="{{ old('hire_date') }}"
                                       rows="4">
                            </div>
                            <div class="form-group">
                                <label for="department_id">Department</label>
                                <select name="department_id" id="department_id" class="form-control p_input" required>
                                    <option value="" disabled>Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" @if(old('department_id') == $department->id) selected @endif>
                                            {{ $department->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">Salary</label>
                                <input type="text" id="inputClientCompany"  value="{{ old('salary', $employee->salary) }}" name="salary" class="form-control"
                                       value="{{ old('salary') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">Commission Pct</label>
                                <input type="text" id="inputProjectLeader" value="{{ old('commission_pct', $employee->commission_pct) }}" name="commission_pct" class="form-control"
                                       value="{{ old('commission_pct') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">Email</label>
                                <input type="email" name="email" id="inputProjectLeader" value="{{ old('email', $employee->email) }}" name="email" class="form-control"
                                       value="{{ old('email') }}">
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
                            <input type="number" id="inputEstimatedBudget" value="{{ old('phone', $employee->phone) }}" name="phone" class="form-control"
                                   value="{{ old('phone') }}">
                        </div>

                        <div class="form-group">
                            <label for="inputEstimatedDuration">Address</label>
                            <textarea id="inputEstimatedDuration" name="address" class="form-control">{{ old('address', isset($employee) ? $employee->address : '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="manager_id">Manager</label>
                            <select name="manager_id" id="manager_id" class="form-control p_input">
                                <option value="" disabled>Select Manager</option>
                                @foreach($managers as $manager)
                                    <option value="{{ $manager->id }}" @if(old('manager_id', isset($employee) ? $employee->manager_id : '') == $manager->id) selected @endif style="color: black;">
                                        {{ $manager->ManagerName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="job_id">Job</label>
                            <select name="job_id" id="job_id" class="form-control p_input" required>
                                <option value="" disabled>Select Job</option>
                                @foreach($jobs as $job)
                                    <option value="{{ $job->id }}" @if(old('job_id') == $job->id) selected @endif>
                                        {{ $job->job_title }}
                                    </option>
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
                <input type="submit" value="Update Employee" class="btn btn-success float-right">
            </div>
        </div>
        </form>
    </section>
@endsection
