<?php

namespace App\Http\Controllers;

use App\Models\Countrie;
use App\Models\Manager;
use App\Models\Payroll;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Job;
use App\Models\Location;
use App\Models\Jobhistory;
use App\Models\Jobgrade;
use App\Models\Region   ;


class AdminController extends Controller
{
    public function Dashboard()
    {

        $Payroll=Payroll::count();
        $Manager=Manager::count();
        $region=Region::count();
        $Location=Location::count();
        $department=Department::count();
        $User=User::count();
        $job=Job::count();
        $jobhistory=Jobhistory::count();
        $jobGrade=Jobgrade::count();
        return view('Admin.Dashboard',compact('jobhistory','jobGrade','Payroll','Manager','region','Location','department','User','job'));
    }

    public function search(Request $request)
    {
        $searchText = $request->search;
        $employee = user::where('name', 'LIKE', "%$searchText%")->orwhere('phone', 'LIKE', "%$searchText%")->get();
        $departments= Department::where('department_name', 'LIKE', "%$searchText%")->get();
        $Managers= Manager::where('ManagerName', 'LIKE', "%$searchText%")->get();
        $Locations= Location::where('city', 'LIKE', "%$searchText%")->get();
        $jobs= Job::where('job_title', 'LIKE', "%$searchText%")->get();
        return view('Admin.employee',compact('employee','departments','Managers','Locations','jobs'));


    }


    public function employee()
    {
        $Managers=Manager::all();
        $Locations=Location::all();
        $departments = Department::all();
        $jobs = Job::all();
        $employees = User::where('role', '=', '0')->get();

        return view('Admin.employee',compact('employees','jobs','departments','Managers','Locations'));
    }
    public function addemployee(Request $request)
    {
        // dd($request->all());
        $employee  = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'hire_date' => 'required',
            'job_id' => 'required',
            'salary' => 'required',
            'commission_pct' => 'required',
            'manager_id' => 'required',
            'department_id' => 'required',
        ]);
        $employee = new User;
        $employee->name = trim($request->name);
        $employee->last_name = trim($request->last_name);
        $employee->email = trim($request->email);
        $employee->phone = trim($request->phone);
        $employee->hire_date = trim($request->hire_date);
        $employee->job_id = trim($request->job_id);
        $employee->location_id = trim($request->location_id);
        $employee->salary = trim($request->salary);
        $employee->commission_pct = trim($request->commission_pct);
        $employee->manager_id = trim($request->manager_id);
        $employee->department_id = trim($request->department_id);
        $employee->address = trim($request->address);
        $employee->role = 0; // e - Employees
        $employee->save();
        return redirect()->back()->with('success', 'Employee successfully created.');


    }
    public function deleteemployee($id)
    {
        $employee = User::find($id);

        $employee->delete();
        return redirect()->back()->with('success', 'user DELETE successfully . ');

    }
    public function editemployee($id)
    {
        $managers=Manager::all();
        $Locations=Location::all();
        $departments = Department::all();
        $jobs = Job::all();

        $employee = User::find($id);
        return view('Admin.editemployee',compact('employee','jobs','departments','managers','Locations'));
    }

    public function updateemployee($id, Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'hire_date' => 'required',
            'job_id' => 'required',
            'salary' => 'required',
            'commission_pct' => 'required',
            'manager_id' => 'required',
            'department_id' => 'required',
        ]);

        // Find the existing employee by ID
        $employee = User::find($id);

        // Update the employee details
        $employee->name = trim($request->name);
        $employee->last_name = trim($request->last_name);
        $employee->email = trim($request->email);
        $employee->phone = trim($request->phone);
        $employee->hire_date = trim($request->hire_date);
        $employee->job_id = trim($request->job_id);
        $employee->salary = trim($request->salary);
        $employee->commission_pct = trim($request->commission_pct);
        $employee->manager_id = trim($request->manager_id);
        $employee->department_id = trim($request->department_id);
        $employee->address = trim($request->address);

        // Assuming 'role' is a field in your User model
        $employee->role = 0; // e - Employees

        $employee->save();

        return redirect()->back()->with('success', 'Employee successfully updated.');
    }
    public function jobs()
    {  $jobs = Job::all();
        return view('Admin.jobs' ,compact('jobs'));
    }

    public function jobsstore(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string',
            'min_salary' => 'required|string',
            'max_salary' => 'required|string',
        ]);

        Job::create([
            'job_title' => $request->input('job_title'),
            'min_salary' => $request->input('min_salary'),
            'max_salary' => $request->input('max_salary'),
        ]);

        return redirect()->back()->with('success', 'Job created successfully');
    }

    public function deletejobs($id)
    {
        $jobs = Job::find($id);

        $jobs->delete();
        return redirect()->back()->with('success', 'Job DELETE successfully . ');

    }
    public function editjobs($id)
    {
        $jobs =Job::find($id);
        return view('Admin.editjobs', compact('jobs'));
    }

    public function updateJobs($id, Request $request)
    {

        $jobs = Job::find($id);
        $jobs->job_title = $request->input('job_title');
        $jobs->min_salary = $request->input('min_salary');
        $jobs->max_salary = $request->input('max_salary');
        $jobs->save();
        return redirect()->back()->with('message', 'jobs update successful');
    }
    public function jobshistory()
    {
        $jobshistorys = Jobhistory::all();
        $employees = User::all();
        $jobs = Job::all();
        $departments = Department::all();
        return view('Admin.jobhistories' ,compact('jobs','employees','departments','jobshistorys'));
    }
    public function jobshistorystore(Request $request)
    {
     //dd($request->all());


        $rules = [
            'employee_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'job_id' => 'required|exists:jobs,id',
            'department_id' => 'required|exists:departments,id',
        ];

        // Validate the request data
        $request->validate($rules);

        // Create a new Job instance and fill it with the form data
        $jobhistory = new Jobhistory();
        $jobhistory->employee_id = $request->input('employee_id');
        $jobhistory->start_date = $request->input('start_date');
        $jobhistory->end_date = $request->input('end_date');
        $jobhistory->job_id = $request->input('job_id');
        $jobhistory->department_id = $request->input('department_id');

        // Save the job to the database
        $jobhistory->save();

        // Redirect back with a success message or do any other response logic
        return redirect()->back()->with('success', 'Job information added successfully');
    }

    public function deletejobshistory($id)
    {
        $jobshistory = Jobhistory::find($id);
        $jobshistory->delete();
        return redirect()->back()->with('success', 'Jobhistory DELETE successfully . ');

    }
    public function editjobshistory($id)
    {

        $employees = User::all();
        $jobs = Job::all();
        $jobshistory =Jobhistory::find($id);
        $departments = Department::all();
        return view('Admin.editjobshistory' ,compact('jobs','employees','departments','jobshistory'));
    }

    public function updateJobshistory($id, Request $request)
    {

        $jobshistory = Job::find($id);
        $jobshistory->employee_id = $request->input('employee_id');
        $jobshistory->start_date = $request->input('start_date');
        $jobshistory->end_date = $request->input('end_date');
        $jobshistory->job_id = $request->input('job_id');
        $jobshistory->department_id = $request->input('department_id');
        $jobshistory->save();
        return redirect()->back()->with('message', 'jobshistory update successful');
    }


    public function JobGrade()
    {
        $JobGrades=Jobgrade::all();
        return view('Admin.JobGrade',compact('JobGrades'));
    }
    public function JobGradestore(Request $request)
    {
        $request->validate([
            'grade_level' => 'required|string',
            'lowest_salary' => 'required|string',
            'highest_salary' => 'required|string',
        ]);

        Jobgrade::create($request->all());

        return redirect()->back()->with('success', 'Jobgrade information added successfully');
    }
    public function deleteJobGrades($id)
    {
        $JobGrade = JobGrade::find($id);

        $JobGrade->delete();
        return redirect()->back()->with('success', 'JobGradeDELETE successfully . ');

    }
    public function editJobGrades($id)
    {
        $JobGrade =JobGrade::find($id);
        return view('Admin.editjobsGrade', compact('JobGrade'));
    }

    public function updateJobGrades($id, Request $request)
    {


        // Validate the input
        $request->validate([
            'grade_level' => 'required|string',
            'lowest_salary' => 'required|string',
            'highest_salary' => 'required|string',
        ]);

        // Find the JobGrade by ID
        $jobGrade = Jobgrade::findOrFail($id);

        // Update the JobGrade record
        $jobGrade->update($request->all());

        // Redirect to a success page or wherever you want
        return redirect()->back()->with('success', 'JobGrade information updated successfully');
    }

    public function createDepartment()
    {
        $Managers=Manager::all();
        $Locations=Location::all();
        $departments=Department::all();
       return view('Admin.Department',compact('departments','Managers','Locations'));
    }
    public function departmentsstore(Request $request)
    {
      //dd($request->all());
        // Validate the form data
        $request->validate([
            'department_name' => 'required|string',
            'manager_id' => 'nullable|string',
            'location_id' => 'required|string',
        ]);

        // Create a new department record
        Department::create([
            'department_name' => $request->input('department_name'),
            'manager_id' => $request->input('manager_id'),
            'location_id' => $request->input('location_id'),
        ]);

        // Redirect to a success page or wherever you want
        return redirect()->back()->with('success', 'Department information added successfully');
    }
    public function deletedepartments($id)
    {
        $departments = Department::find($id);

        $departments->delete();
        return redirect()->back()->with('success', 'departmentsDELETE successfully . ');

    }
    public function editdepartments($id)
    {
        $managers=Manager::all();
        $locations=Location::all();
        $department =Department::find($id);
        return view('Admin.editdepartment', compact('department','managers','locations'));
    }

    public function updatedepartments($id, Request $request)
    {
        // Validate the input
        $request->validate([
            'department_name' => 'required|string',
            'manager_id' => 'nullable|string',
            'location_id' => 'required|string',
        ]);

        // Find the department by ID
        $department = Department::findOrFail($id);

        // Update the department record
        $department->update([
            'department_name' => $request->input('department_name'),
            'manager_id' => $request->input('manager_id'),
            'location_id' => $request->input('location_id'),
        ]);

        // Redirect to a success page or wherever you want
        return redirect()->back()->with('success', 'Department information updated successfully');
    }

    public function countriescreate()
    {
        $regions=Region::all();
        $countries=Countrie::orderBy('id', 'desc')->get();
        return view('Admin.countries',compact('regions','countries'));
    }
    public function countriestore(Request $request)
    {
        $request->validate([

        ]);

        Countrie::create([
            'country_name' => $request->input('country_name'),
            'regions_id' => $request->input('regions_id'),

        ]);

        return redirect()->back()->with('success', 'countries created successfully!');
    }
    public function deletecountries($id)
    {
        $countries =Countrie::find($id);

        $countries->delete();
        return redirect()->back()->with('success', 'countries DELETE successfully . ');

    }
    public function editcountries($id)
    {
        $regions=Region::all();
        $countries =Countrie::find($id);
        return view('Admin.editcountries', compact('countries','regions'));
    }

    public function updatecountries($id, Request $request)
    {

        $request->validate([
            'country_name' => 'required|string',
            'regions_id' => 'required|integer',
        ]);

        $country = Countrie::findOrFail($id); // Find the existing record by ID

        // Update the fields
        $country->update([
            'country_name' => $request->input('country_name'),
            'regions_id' => $request->input('regions_id'),
        ]);

        return redirect()->back()->with('success', 'Country updated successfully!');

    }

    public function Locationcreate()
    {
        $Locations=Location::all();
        $countries=Countrie::all();
        return view('Admin.Location',compact('countries','Locations'));
    }

    public function Locationtore(Request $request)
    {

        $request->validate([
            'street_address' => 'required|string',
            'postal_code' => 'required|string',
            'city' => 'required|string',
            'state_province' => 'required|string',
            'countries_id' => 'required|numeric',
        ]);

        // Create a new location with the values from the request
        $location = Location::create([
            'street_address' => $request->input('street_address'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'state_province' => $request->input('state_province'),
            'countries_id' => $request->input('countries_id'),
        ]);

        // Alternatively, you can use the fill and save method
        // $location = new Location();
        $location->fill($request->all());
        // $location->save();

        return redirect()->back()->with('success', 'Locations add successfully . ');
    }
    public function deleteLocation($id)
    {
        $Locations = Location::find($id);

        $Locations->delete();
        return redirect()->back()->with('success', 'LocationsDELETE successfully . ');

    }
    public function editLocation($id)
    {
        $countries=Countrie::all();
        $Locations =Location::find($id);
        return view('Admin.editLocation', compact('Locations','countries'));
    }

    public function updateLocation($id, Request $request)
    {

        $request->validate([
            'street_address' => 'required|string',
            'postal_code' => 'required|string',
            'city' => 'required|string',
            'state_province' => 'required|string',
            'countries_id' => 'required|numeric',
        ]);

        // Find the existing location by ID
        $location = Location::findOrFail($id);

        // Update the location fields with the new values from the request
        $location->update([
            'street_address' => $request->input('street_address'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'state_province' => $request->input('state_province'),
            'countries_id' => $request->input('countries_id'),
        ]);


        $location->fill($request->all());
        // $location->save();

        return redirect()->back()->with('success', 'Address updated successfully!');
    }

    public function regionscreate()
    {
    $regions=Region::all();
        return view('Admin.regions',compact('regions'));
    }

    public function regionstore(Request $request)
    {
        $request->validate([
            'regionname' => 'required|string|max:255',
        ]);

        Region::create([
            'regionname' => $request->input('regionname'),
        ]);

        return redirect()->back()->with('success', 'Region created successfully!');
    }
    public function deleteregions($id)
    {
        $regions = Region::find($id);

        $regions->delete();
        return redirect()->back()->with('success', 'regionsDELETE successfully . ');

    }
    public function editregions($id)
    {
        $regions =Region::find($id);
        return view('Admin.editregions', compact('regions'));
    }

    public function updateregions($id, Request $request)
    {
        $request->validate([
            'regionname' => 'required|string|max:255',
        ]);

        $region = Region::findOrFail($id);

        $region->update([
            'regionname' => $request->input('regionname'),
        ]);

        return redirect()->back()->with('success', 'Region updated successfully!');
    }

    public function home()
    {
        return view('welcome');
    }

    public function ManagerCreate()
    {
        $Managers=Manager::all();
        return view('Admin.Manager',compact('Managers'));
    }
    public function Managerstore(Request $request)
    {



        $rules = [
            'ManagerName' => 'required|string|max:255',
            'ManagerEmail' => 'required|string|max:255',
            'ManagerMobile' => 'required|string|max:255',

                   ];

        // Validate the request data
        $request->validate($rules);

        // Create a new Job instance and fill it with the form data
        $Manager = new Manager();
        $Manager->ManagerName = $request->input('ManagerName');
        $Manager->ManagerEmail = $request->input('ManagerEmail');
        $Manager->ManagerMobile = $request->input('ManagerMobile');


        // Save the job to the database
        $Manager->save();

        // Redirect back with a success message or do any other response logic
        return redirect()->back()->with('success', 'Manager information added successfully');


    }
    public function deleteManagers($id)
    {
        $Managers = Manager::find($id);

        $Managers->delete();
        return redirect()->back()->with('success', 'ManagersDELETE successfully . ');

    }
    public function editManagers($id)
    {
        $Managers = Manager::find($id);
        return view('Admin.editManager', compact('Managers'));
    }

    public function updateManagers($id, Request $request)
    {

        $rules = [
            'ManagerName' => 'required|string|max:255',
            'ManagerEmail' => 'required|string|max:255',
            'ManagerMobile' => 'required|string|max:255',

        ];

        // Validate the request data
        $request->validate($rules);

        $Manager = Manager::find($id);
        $Manager->ManagerName = $request->input('ManagerName');
        $Manager->ManagerEmail = $request->input('ManagerEmail');
        $Manager->ManagerMobile = $request->input('ManagerMobile');


        // Save the job to the database
        $Manager->save();

        // Redirect back with a success message or do any other response logic
        return redirect()->back()->with('success', 'Manager information added successfully');

    }


    public function payrollCreate()
    {
        $users=User::all();
        $payrolls=Payroll::all();
        return view('Admin.payroll',compact('payrolls','users'));
    }
    public function payrollstore(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'user_id' => 'required',
            'number_of_day_work' => 'required',
            'bonus' => 'required',
            'overtime' => 'required',
            'gross_salary' => 'required',
            'cash_advance' => 'required',
            'late_hours' => 'required',
            'absent_days' => 'required',
            'sss_contribution' => 'required',
            'philhealth' => 'required',
            'total_deductions' => 'required',
            'netpay' => 'required',
            'payroll_monthly' => 'required',
        ]);


        $payroll = new Payroll($validatedData);
        $payroll->save();

        // Redirect to the payrolls index page with a success message
        return redirect()->back()->with('success', 'Payroll created successfully.');

    }
    public function deletepayroll($id)
    {
        $payroll = payroll::find($id);

        $payroll->delete();
        return redirect()->back()->with('success', 'payrollDELETE successfully . ');

    }
    public function editpayroll($id)
    {
        $payroll =payroll::find($id);
        return view('Admin.editpayroll', compact('payroll'));
    }

    public function updatepayroll($id, Request $request)
    {

        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required',
            'number_of_day_work' => 'required',
            'bonus' => 'required',
            'overtime' => 'required',
            'gross_salary' => 'required',
            'cash_advance' => 'required',
            'late_hours' => 'required',
            'absent_days' => 'required',
            'sss_contribution' => 'required',
            'philhealth' => 'required',
            'total_deductions' => 'required',
            'netpay' => 'required',
            'payroll_monthly' => 'required',
        ]);

        // Find the existing payroll record by ID
        $payroll = Payroll::find($id);

        // Update the payroll record with the validated data
        $payroll->update($validatedData);

        // Redirect to the payrolls index page with a success message
        return redirect()->back()->with('success', 'Payroll updated successfully.');
    }








}
