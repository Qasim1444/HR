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
                <form action="{{ route('update.Payroll',$payroll->id) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputJobTitle">User(user_id)</label>
                            <input type="text" id="inputJobTitle" value="{{ $payroll->user_id}}"  name="user_id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputMinSalary">Number_of_day_work</label>
                            <input type="text" id="inputMinSalary" value="{{ $payroll->number_of_day_work}}" name="number_of_day_work" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputMaxSalary">Bonus</label>
                            <input type="text" id="inputMaxSalary" value="{{ $payroll->bonus}}" name="bonus" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputOvertime">Overtime</label>
                        <input type="text" id="inputOvertime" name="overtime" value="{{ $payroll->overtime }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="inputGrossSalary">Gross Salary</label>
                        <input type="text" id="inputGrossSalary" name="gross_salary" value="{{ $payroll->gross_salary }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="inputCashAdvance">Cash Advance</label>
                        <input type="text" id="inputCashAdvance" name="cash_advance" value="{{ $payroll->cash_advance }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="inputLateHours">Late Hours</label>
                        <input type="text" id="inputLateHours" name="late_hours" value="{{ $payroll->late_hours }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAbsentDays">Absent Days</label>
                        <input type="text" id="inputAbsentDays" name="absent_days" value="{{ $payroll->absent_days }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="inputSSSContribution">SSS Contribution</label>
                        <input type="text" id="inputSSSContribution" name="sss_contribution" value="{{ $payroll->sss_contribution }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPhilhealth">Philhealth</label>
                        <input type="text" id="inputPhilhealth" name="philhealth" value="{{ $payroll->philhealth }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="inputTotalDeductions">Total Deductions</label>
                        <input type="text" id="inputTotalDeductions" name="total_deductions" value="{{ $payroll->total_deductions }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="inputNetpay">Netpay</label>
                        <input type="text" id="inputNetpay" name="netpay" value="{{ $payroll->netpay }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPayrollMonthly">Payroll Monthly</label>
                        <input type="text" id="inputPayrollMonthly" name="payroll_monthly" value="{{ $payroll->payroll_monthly }}" class="form-control" required>
                    </div>

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
