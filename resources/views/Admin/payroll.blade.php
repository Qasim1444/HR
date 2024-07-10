
@extends('welcome')
@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Payroll Form
            </div>
            @include('message')
            <div class="card-body">
                <form action="{{ route('Payroll.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="user_id">Employee</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="" disabled selected>Select an Employee</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} {{ $user->last_name }}</option>
                            @endforeach
                        </select>
                        <div style="color:red">{{ $errors->first('user_id') }}</div>
                    </div>
                    <div class="mb-3">
                        <label for="number_of_day_work" class="form-label">Number of Day Work:</label>
                        <input type="text" class="form-control" id="number_of_day_work" name="number_of_day_work" required>
                    </div>
                    <div class="mb-3">
                        <label for="bonus" class="form-label">Bonus:</label>
                        <input type="text" class="form-control" id="bonus" name="bonus" required>
                    </div>
                    <div class="mb-3">
                        <label for="overtime" class="form-label">Overtime:</label>
                        <input type="text" class="form-control" id="overtime" name="overtime" required>
                    </div>
                    <div class="mb-3">
                        <label for="gross_salary" class="form-label">Gross Salary:</label>
                        <input type="text" class="form-control" id="gross_salary" name="gross_salary" required>
                    </div>
                    <div class="mb-3">
                        <label for="cash_advance" class="form-label">Cash Advance:</label>
                        <input type="text" class="form-control" id="cash_advance" name="cash_advance" required>
                    </div>
                    <div class="mb-3">
                        <label for="late_hours" class="form-label">Late Hours:</label>
                        <input type="text" class="form-control" id="late_hours" name="late_hours" required>
                    </div>
                    <div class="mb-3">
                        <label for="absent_days" class="form-label">Absent Days:</label>
                        <input type="text" class="form-control" id="absent_days" name="absent_days" required>
                    </div>
                    <div class="mb-3">
                        <label for="sss_contribution" class="form-label">SSS Contribution:</label>
                        <input type="text" class="form-control" id="sss_contribution" name="sss_contribution" required>
                    </div>
                    <div class="mb-3">
                        <label for="philhealth" class="form-label">Philhealth:</label>
                        <input type="text" class="form-control" id="philhealth" name="philhealth" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_deductions" class="form-label">Total Deductions:</label>
                        <input type="text" class="form-control" id="total_deductions" name="total_deductions" required>
                    </div>
                    <div class="mb-3">
                        <label for="netpay" class="form-label">Netpay:</label>
                        <input type="text" class="form-control" id="netpay" name="netpay" required>
                    </div>
                    <div class="mb-3">
                        <label for="payroll_monthly" class="form-label">Payroll Monthly:</label>
                        <input type="text" class="form-control" id="payroll_monthly" name="payroll_monthly" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Process Payroll</button>
                </form>
                <div class="container mt-5">
                    <div class="card">
                        <div class="card-header">
                            Payroll Data Table
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(count($payrolls) > 0)
                                    <table  class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Number of Day Work</th>
                                            <th>Bonus</th>
                                            <th>Overtime</th>
                                            <th>Gross Salary</th>
                                            <th>Cash Advance</th>
                                            <th>Late Hours</th>
                                            <th>Absent Days</th>
                                            <th>SSS Contribution</th>
                                            <th>Philhealth</th>
                                            <th>Total Deductions</th>
                                            <th>Net Pay</th>
                                            <th>Payroll Monthly</th>
                                            <th>Update/Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($payrolls as $data)
                                            <tr>
                                                <td>{{ $data->getUserName->name }}</td>
                                                <td>{{ $data['number_of_day_work'] }}</td>
                                                <td>{{ $data['bonus'] }}</td>
                                                <td>{{ $data['overtime'] }}</td>
                                                <td>{{ $data['gross_salary'] }}</td>
                                                <td>{{ $data['cash_advance'] }}</td>
                                                <td>{{ $data['late_hours'] }}</td>
                                                <td>{{ $data['absent_days'] }}</td>
                                                <td>{{ $data['sss_contribution'] }}</td>
                                                <td>{{ $data['philhealth'] }}</td>
                                                <td>{{ $data['total_deductions'] }}</td>
                                                <td>{{ $data['netpay'] }}</td>
                                                <td>{{ $data['payroll_monthly'] }}</td>
                                                <td>

                                                    <a class="btn btn-primary btn-sm" href="{{route('edit.Payroll',$data->id)}}">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>


                                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.Payroll', $data->id) }}">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>No payroll data available.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
