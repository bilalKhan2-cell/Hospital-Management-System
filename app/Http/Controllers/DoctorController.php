<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DoctorController extends Controller
{
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
        return view('admin.doctors.create', [
            'specializations' => Doctor::$specializations,
            'departments' => Department::pluck('name', 'id')
        ]);
    }

    public function store(Request $request)
    {
        $validated_doctor_data = $request->validate(Doctor::$rules, Doctor::$messages);
        Doctor::create($validated_doctor_data);
        return redirect()->route('doctors.index')->with('success', 'Doctor Registred Successfully..');
    }

    public function edit($id)
    {
        return view('admin.doctors.edit', [
            'specializations' => Doctor::$specializations,
            'departments' => Department::pluck('name', 'id'),
            'doctor' => Doctor::find($id)
        ]);
    }

    public function update(Request $request, string $id)
    {
        Doctor::where('id', $id)->update($request->only(['name', 'gender', 'dob', 'contact_info', 'address', 'specialization', 'email', 'cnic', 'department_id', 'joining_date', 'status']));
        Doctor::where('id', $id)->update(['user_id' => Auth::user()->id]);
        return redirect()->route('doctors.index')->with('success', 'Doctor Data Updated Successfully..');
    }

    public function show_doctor_dashboard()
    {
        return view('doctor.dashboard');
    }

    public function show_pending_appointments()
    {
        return true;
    }

    public function show_patients(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Patient::where('is_checkup', 0)->where('doctor_id', Auth::guard('doctor')->user()->id)->get())
                ->addIndexColumn()
                ->addColumn('action', function (Patient $patient) {
                    $btnActions = $patient->is_checkup == 0 ? "<button id='".$patient->id."' title='Send Patient Admitting Request' data-toggle='modal' data-target='#WardModal' onclick='CreateAdmitRequest(this)' class='btn btn-sm btn-info'><i class='fa fa-user-plus'></i></button>" : '';
                    return $btnActions;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('doctor.patient_list',[
            'ward_list' => Ward::pluck('name','id')
        ]);
    }

    public function show_doctor_profile_page(){
        return view('doctor.profile',[
            'user' => Auth::guard('doctor')->user()
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('user.login');
    }
}
