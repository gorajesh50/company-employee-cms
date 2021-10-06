<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Companies;

class EmployeeController extends Controller
{
    public function index()
    {
        //$employee = Employee::all();
		$employee = Employee::paginate(10);
        return view('index', compact('employee'));
    }
    public function create()
    {
		$companies = Companies::all();
		//dd($companies[3]->name);
        return view('welcome', compact('companies'));
    }
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|numeric',
			'company_id' => ''
        ]);
		//dd($storeData);
        $employee = Employee::create($storeData);

        return redirect('/employees')->with('completed', 'New Employee created..!');
    }
    public function show($id)
    {
       
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
		$companies = Companies::all();
        return view('update', compact('employee', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|numeric',
			'company_id' => ''
        ]);

        Employee::whereId($id)->update($data);
        return redirect('/employees')->with('completed', 'Employee updated..!');
    }
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect('/employees')->with('completed', 'Employee deleted');
    }   
}
