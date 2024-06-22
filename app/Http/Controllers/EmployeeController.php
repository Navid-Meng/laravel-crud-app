<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('employees.index', ['employees' => $employees]);
    }
    public function create(){
        return view('employees.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'position' => 'required|max:10',
            'salary' => 'required|numeric'
        ]);
        Employee::create($data);
        return redirect(route('employee.index'));
    }

    public function edit(Employee $employee){
        return view('employees.edit', ['employee' => $employee]);
    }

    public function update(Employee $employee, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'position' => 'required|max:10',
            'salary' => 'required|numeric'
        ]);
        $employee->update($data);
        return redirect(route('employee.index'));
    }
    public function destroy(Employee $employee){
        $employee->delete();
        return redirect(route('employee.index'));
    }
}
