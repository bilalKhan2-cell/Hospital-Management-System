<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    private $blocks;

    public function __construct()
    {
        $blocks = new Block();
        $this->blocks = $blocks->pluck('name', 'id');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Department::with('block')->get())
                ->addIndexColumn()
                ->addColumn("action", function (Department $department) {
                    $btn = '<a href="' . route('departments.edit', $department->id) . '" class="edit btn btn-info btn-sm"><i class="md md-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.departments.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departments.create', [
            'blocks' => $this->blocks
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:departments,name|max:100']);

        Department::create([
            'name' => $request->name,
            'description' => $request->description,
            'block_id' => $request->block,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('departments.index')->with('success', 'Department Registered Successfully..');
    }

    public function edit(Department $department)
    {
        $department_data = $department->with('block')->find($department->id);
        return view('admin.departments.edit', [
            'department' => $department_data,
            'blocks' => $this->blocks
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $updated_block = Department::where('id', $department->id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'block_id' => $request->block,
                'user_id' => Auth::user()->id
            ]);

        if ($updated_block) {
            return redirect()->route('departments.index')->with('success', 'Department Detail Updated Successfully..');
        }
    }
    
}
