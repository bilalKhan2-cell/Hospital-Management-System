<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DesignationController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Designation::query())
                ->addIndexColumn()
                ->addColumn("action", function (Designation $designation) {
                    $btn = '<a href="' . route('designations.edit', $designation->id) . '" class="edit btn btn-info btn-sm"><i class="md md-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('admin.designations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.designations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:designations,name|max:100'
        ]);

        $designation = Designation::create([
            'name' => $request->name,
            'comments' => $request->comments,
            'user_id' => Auth::user()->id
        ]);

        if ($designation) {
            return redirect()->route('designations.index')->with('success', 'Designation Title Created Successfully..');
        }
    }

    public function edit(Designation $designation)
    {
        return view('admin.designations.edit', [
            'designation' => $designation
        ]);
    }


    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);

        $designation = Designation::where('id', $designation->id)->update([
            'name' => $request->name,
            'comments' => $request->comments,
            'user_id' => Auth::user()->id
        ]);

        if ($designation) {
            return redirect()->route('designations.index')->with('success', 'Designation Title Updated Successfully..');
        }
    }

    public function destroy(Designation $designation)
    {
        //
    }
}
