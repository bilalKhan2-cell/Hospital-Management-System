<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\PatientOutcome;
use App\Models\PatientRecieving;
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

        $this->patient->find($id)->update($patient_data);
        return redirect()->route('patients.index')->with('success', 'Patient Detail\'s Updated Successfully..');
    }

    public function send_patient_admitting_request(Request $request)
    {
        PatientRecieving::create([
            'patient_id' => $request->patient_id,
            'ward_id' => $request->ward_id,
            'notes' => $request->notes,
            'is_admitted' => 0
        ]);

        Patient::find($request->patient_id)->update(['is_checkup' => 1]);

        return redirect()->route('doctors.show_patients')->with('success', 'Patient Admtting Request Submitted Successfully');
    }

    public function show_admitting_request_patients(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(PatientRecieving::with('patient', 'user', 'patient.doctor')->get())
                ->addIndexColumn()
                ->addColumn('action', function (PatientRecieving $patientRecieving) {
                    return '<a href="' . route('patient.create_admitting', $patientRecieving->id) . '" class="btn btn-sm btn-outline-info rounded-circle"><i class="md md-edit"></i></a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.patient_recieving.index');
    }

    public function create_admitting_request($id)
    {
        $data = PatientRecieving::find($id);
        if (!empty($data)) {
            return view('admin.patient_recieving.create', [
                'patient' => $data->patient,
                'patient_recieving' => $data
            ]);
        } else {
            return redirect()->route('error', ['fallbackPlaceholder' => 'fallbackPlaceholder']);
        }
    }

    public function submit_admitting_request(Request $request, $id)
    {
        $request->validate([
            'attendant_name' => 'required',
            'cnic' => 'required',
            'contact_info' => 'required'
        ], [
            'name.required' => 'Attendant Name is Required',
            'cnic.required' => 'Attendant CNIC is Required',
            'contact_info.required' => "Attendant Contact No. is Required"
        ]);

        PatientRecieving::find($id)->update(['attendant_name' => $request->attendant_name, 'user_id' => Auth::guard('web')->user()->id, 'attendant_cnic' => $request->cnic, 'attendant_contact_info' => $request->contact_info, 'is_admitted' => 1]);
        return redirect()->route('patients.admitting')->with('success', 'Patient Admitted Successfully..');
    }

    public function list_patients_outcome(Request $request)
    {

        if ($request->ajax()) {
            return DataTables::of(PatientOutcome::with('patient_recieving','patient_recieving.patient','patient_recieving.ward','user')->get())
                ->addIndexColumn()
                ->addColumn('action', function () {
                    return 'Click Here';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.patient_outcome.index');
    }

    public function create_outcomes(){
        $patients = array();
        $in_patients = PatientRecieving::where('is_admitted', 1)->get();
        
        foreach ($in_patients as $key => $value) {
            $patient = Patient::find($value->patient_id);
            $patient_recieving_id = PatientRecieving::where('patient_id',$value->patient_id)->first(['id']);
            if(!PatientOutcome::where('patient_recieving_id',$patient_recieving_id->id)->exists()){
                $formatted_name = 'MR-' . $patient->id . ' (' . $patient->name . ')';
                $patients[$patient->id] = $formatted_name;
            }
        }
        
        return view('admin.patient_outcome.create', [
            'in_patients' => $patients,
            'outcome_list' => PatientOutcome::$outcome_list
        ]);
    }

    public function submit_outcome(Request $request){
        
        $request->validate([
            'patient_id' => 'required'
        ],[
            'patient_id.required' => "Please Select Patient"
        ]);
        
        $patient_recieving_id = PatientRecieving::where('patient_id',$request->patient_id)->first(['id']);
        
        PatientOutcome::create([
            'patient_recieving_id' => $patient_recieving_id->id,
            'result_date' => date('y/m/d'),
            'patient_outcome' => $request->patient_outcome,
            'user_id' => Auth::guard('web')->user()->id,
            'final_notes' => $request->notes
        ]);

        return redirect()->route('patients.show_outcome')->with('success','Patient Outcome Submitted Successfully..');
    }
}
