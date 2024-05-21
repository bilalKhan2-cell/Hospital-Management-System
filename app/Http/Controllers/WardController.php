<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use App\Http\Requests\StoreWardRequest;
use App\Http\Requests\UpdateWardRequest;
use App\Models\Block;
use App\Models\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Ward::with('get_department', 'get_block')->get())
                ->addColumn('action', function (Ward $ward) {
                    return "<a href='" . route('ward.edit', $ward->id) . "' class='btn btn-outline-info border-0 btn-sm rounded-circle'><i class='fa fa-edit'></i></a>";
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.wards.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(Department::where('block_id', $request->block_id)->get(['title', 'id']));
        }

        return view('admin.wards.create', [
            'blocks' => Block::pluck('title', 'id'),
            'departments' => Department::pluck('title', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWardRequest $request)
    {
        Ward::create($request->only('name', 'block_id', 'comments', 'department_id'));
        return redirect()->route('ward.index')->with('success', "Ward Registered Successfully..");
    }

    public function edit(Ward $ward)
    {
        return view('admin.wards.edit', ['ward' => $ward, 'blocks' => Block::pluck('title', 'id')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWardRequest $request, Ward $ward)
    {
        $ward->update($request->only('name', 'block_id', 'comments', 'department_id'));
        return redirect()->route('ward.index')->with('success', "Ward's Data Updated Successfully..");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ward $ward)
    {
        //
    }
}
