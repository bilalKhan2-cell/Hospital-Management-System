<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class WardController extends Controller
{
    private $departments, $ward;

    public function __construct()
    {
        $this->departments = Department::pluck('name', 'id');
        $this->ward = new Ward();
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of($this->ward->with('department', 'department.block')->get())
                ->addIndexColumn()
                ->addColumn("action", function ($id) {
                    $btn = '<a href="' . route('wards.edit', $id) . '" class="edit btn btn-info btn-sm"><i class="md md-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.wards.index');
    }


    public function create()
    {
        return view('admin.wards.create', [
            'departments' => $this->departments
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:wards,name|max:100'
        ],[
            'name.required' => "Ward Name is Required",
            "name.unique" => "This Ward Name is Already Existed"
        ]);

        Ward::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'department_id' => $request->department
        ]);

        return redirect()->route('wards.index')->with('success', 'Ward Registered Successfully..');
    }

    public function edit(Ward $ward)
    {
        return view('admin.wards.edit', [
            'departments' => $this->departments,
            'ward' => $ward->with('department')->find($ward->id)
        ]);
    }


    public function update(Request $request, Ward $ward)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);

        Ward::where('id', $ward->id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'user_id' => Auth::user()->id,
                'department_id' => $request->department
            ]);

        return redirect()->route('wards.index')->with('success', 'Ward\'s Details Updated Successfully..');
    }
}
