<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DoctorController extends Controller
{
    private $doctor;

    public function __construct()
    {
        return $this->doctor = new Doctor();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Doctor::with('doctor_department')->get())
                ->addIndexColumn()
                ->addColumn("action", function (Doctor $doctor) {
                    $btn = '<a href="' . route('doctors.edit', $doctor->id) . '" class="edit btn btn-info btn-sm"><i class="md md-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.doctors.index');
    }

    public function create()
    {
        return view('admin.doctors.create');
    }

    public function store(Request $request)
    {
        $validated_doctor_data = $request->validate(Doctor::$rules, Doctor::$messages);
        Doctor::create($validated_doctor_data);
        return redirect()->route('doctors.index')->with('success', 'Doctor Registred Successfully..');
    }

    public function edit($id)
    {
        return view('admin.doctors.edit', ['doctor' => Doctor::find('$id')]);
    }

    public function update(Request $request, string $id)
    {
        Doctor::where('id', $id)->update($request->only(['name', 'gender', 'user_id', 'dob', 'contact_info', 'address', 'specialization', 'email', 'cnic', 'department_id', 'joining_date', 'status']));
    }
}
