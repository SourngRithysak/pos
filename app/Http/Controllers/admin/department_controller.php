<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class department_controller extends Controller
{
    function department()
    {
        $departments = DB::table('tbl_departments')->paginate(10);
        return view('admin.department.department', ['departments' => $departments]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required',
        ]);

        Department::create([
            'department_name' => $request->department_name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Department added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required|exists:tbl_departments,id',
            'department_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required', 
        ]);

        $department = Department::findOrFail($id);
        $department->update([
            'department_name' => $request->department_name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Department updated successfully!');
    }
}
