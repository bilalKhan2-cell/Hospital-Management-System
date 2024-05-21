<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use App\Http\Requests\StoreWardRequest;
use App\Http\Requests\UpdateWardRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WardController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            return DataTables::of(Ward::all())
            ->addColumn('action',function(Ward $ward){
                return "<a href='" . route('department.edit', $ward->id) . "' class='btn btn-outline-info border-0 btn-sm rounded-circle'><i class='fa fa-edit'></i></a>";
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.wards.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.wards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWardRequest $request)
    {
        //
    }

    public function edit(Ward $ward)
    {
        return view('');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWardRequest $request, Ward $ward)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ward $ward)
    {
        //
    }
}
