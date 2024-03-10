<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PatientController extends Controller
{
    private $patient;

    public function __construct()
    {
        $this->patient = new Patient();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of($this->patient->all())
                ->addIndexColumn()
                ->addColumn("action", function ($id) {
                    $btn = '<a href="' . route('patients.edit', $id) . '" class="edit btn btn-info btn-sm"><i class="md md-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.patients.index');
    }

    public function create()
    {
        return view('admin.patients.create');
    }

    public function store(Request $request)
    {
        $patient_validate_data = $request->validate(Patient::$rules,Patient::$messages);
        $this->patient->create($patient_validate_data);

        return redirect()->route('patients.index')->with('success', 'Patient Registered Successfully..');
    }

    public function edit(string $id)
    {
        return view('admin.patients.edit', ['patient' => $this->patient->find($id)]);
    }

    public function update(Request $request, string $id)
    {
        $this->patient->where('id', $id)->update($request->only('name','fname','age','gender','address','contact_info','cnic'));
        return redirect()->route('patients.index')->with('success', 'Patient Detail\'s Updated Successfully..');
    }
}
