<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Yajra\DataTables\DataTables;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Supplier::with('registered_by')->get())
                ->addIndexColumn()
                ->addColumn('action', function (Supplier $supplier) {
                    $btn = '<a href="' . route('suppliers.edit', $supplier->id) . '" class="edit btn btn-info btn-sm"><i class="md md-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.suppliers.index');
    }

    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:suppliers,email',
            'contact_info' => 'required',
            'address' => 'required'
        ],[
            'name.required' => 'Supplier Name is Mandatory',
            'email.required' => "Please Provide Email Address",
            "email.unique" => 'A Supplier With This Email Address is Already Exist',
            'email.email' => 'Invalid Email Address Format',
            'contact_info.required' => "Contact No.of Supplier is Required",
            "address.required" => "Supplier Address is Mandatory"
        ]);

        Supplier::create($request->only('name','email','contact_info','address','user_id'));
        return redirect()->route('suppliers.index')->with('success','Supplier Registered Successfully..');
    }

    public function edit($id)
    {
        return view('admin.suppliers.edit',[
            'supplier' => Supplier::find($id)
        ]);
    }

    public function update(Request $request, string $id)
    {
        Supplier::where('id',$id)->update($request->only('name','email','contact_info','address'));
        return redirect()->route('suppliers.index')->with('success','Supplier Derails Updated Successfully..');
    }

}
