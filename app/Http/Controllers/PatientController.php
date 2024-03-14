<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            return DataTables::of($this->patient->with('doctor')->get())
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
        return view('admin.patients.create', [
            'doctors' => Doctor::pluck('name', 'id')
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(Patient::$rules, Patient::$messages);

        $patient_data = [
            'name' => $request->name, 
            'fname' => $request->fname, 
            'age' => $request->age, 
            'gender' => $request->gender, 
            'address' => $request->address, 
            'contact_info' => $request->contact_info,
            'cnic' => $request->cnic,
            'user_id' => Auth::user()->id
        ];

        $this->patient->create($patient_data);

        return redirect()->route('patients.index')->with('success', 'Patient Registered Successfully..');
    }

    public function edit(string $id)
    {
        return view('admin.patients.edit', ['patient' => $this->patient->find($id), 'doctors' => Doctor::pluck('name', 'id')]);
    }

    public function update(Request $request, string $id)
    {
        $patient_data = [
            'name' => $request->name, 
            'fname' => $request->fname, 
            'age' => $request->age, 
            'gender' => $request->gender, 
            'address' => $request->address, 
            'contact_info' => $request->contact_info,
            'cnic' => $request->cnic,
            'user_id' => Auth::user()->id
        ];

        $this->patient->where('id', $id)->update($patient_data);
        return redirect()->route('patients.index')->with('success', 'Patient Detail\'s Updated Successfully..');
    }
}
