<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function createEmployee(Request $request){
      $employee = new Employee();
      $employee->name = $request->input('name');
      $employee->address = $request->input('address');
      $employee->email = $request->input('email');
      $employee->save();
      return response()->json($employee);
    }

    public function getAllEmployee(Request $request) {
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function getEmployeeById(Request $request, $id) {
        $employee = Employee::find($id);
        return response()->json($employee);
    }

    public function updateEmployeeById(Request $request, $id) {
        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->address = $request->input('address');
        $employee->email = $request->input('email');
        $employee->save();
        return response()->json($employee);
    }

    public function deleteEmployeeById(Request $request, $id) {
        $employee = Employee::find($id)->delete();
        return response()->json($employee);
    }
}
