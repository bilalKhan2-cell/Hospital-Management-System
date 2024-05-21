<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Block;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Department::with('dept_block')->get())
                ->addColumn('action', function (Department $department) {
                    return "<a href='" . route('department.edit', $department->id) . "' class='btn btn-outline-info border-0 btn-sm rounded-circle'><i class='fa fa-edit'></i></a>";
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.department.index');
    }

    public function create()
    {
        return view('admin.department.create', [
            'blocks' => Block::pluck('title', 'id')
        ]);
    }

    public function store(StoreDepartmentRequest $request)
    {
        Department::create($request->only('title', 'comments', 'block_id'));
        return redirect()->route('department.index')->with('success', 'Department Registered Successfully..');
    }

    public function edit(Department $department)
    {
        return view('admin.department.edit', [
            'department' => $department,
            'blocks' => Block::pluck('title', 'id')
        ]);
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update($request->only('title', 'comments', 'block_id'));
        return redirect()->route('department.index')->with('success', 'Department\'s Details Updated Successfully..');
    }

    public function destroy(Department $department)
    {
        //
    }
}
