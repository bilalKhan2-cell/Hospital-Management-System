<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\{
    Department,
    Block,
    Ward,
    Designation
};

class UserController extends Controller
{

    private $blocks, $department, $user, $wards, $designations;

    public function __construct()
    {
        $this->blocks = Block::pluck('name', 'id');
        $this->department = Department::pluck('name', 'id');
        $this->wards = Ward::pluck('name', 'id');
        $this->designations = Designation::pluck('name', 'id');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(User::with('user_designation')->get())
                ->addIndexColumn()
                ->addColumn("action", function (User $user) {
                    $btn = '<a href="' . route('users.edit', $user->id) . '" class="edit btn btn-info btn-sm"><i class="md md-edit"></i></a>';
                    $btn .= "&nbsp; &nbsp;<button data-target='#exampleModal' data-toggle='modal' id='".$user->id."' onclick='ShowModal(" . $user->id . ")' class='btn btn-primary btn-sm'><i class='md md-launch'></i></button>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create', [
            'designations' => $this->designations
        ]);
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->only(['name','email','cnic','contact_info','address','designation_id','status']));
        if ($user) {
            return redirect()->route('users.index')->with('success', 'User Registered Successfully..');
        }
    }

    public function assign_designation()
    {
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'designations' => $this->designations,
            'user' => $user->with('user_designation')->find($user->id)
        ]);
    }

    public function show(Request $request)
    {
        $user_id = $request->user_id;

        $user = User::with('user_designation', 'user_ward', 'user_department', 'user_block')->find($user_id);

        $modal_content = view('admin.users.manage_assignments', [
            'user_designation' => $user->user_designation == null ? 'Not Assigned Yet' : $user->user_designation->name,
            'user_block' => $user->user_block == null ? 'Not Assigned Yet' : $user->user_block->name,
            'user_ward' =>  $user->user_ward == null ? 'Not Assigned Yet' : $user->user_ward->name,
            'user_department' =>  $user->user_department == null ? 'Not Assigned Yet' : $user->user_department->name,
            'departments' => Department::pluck('name','id'),
            'blocks' => Block::pluck('name','id'),
            'wards' => Ward::pluck('name','id'),
            'userID' => $user_id
        ])->render();

        return response()->json(['html' => $modal_content]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'Users Details Updated Successfully..');
    }

    public function assign_role(Request $request)
    {
        $user = User::find($request->user_id);
        $user->update($request->only(['ward_id','block_id','department_id']));

        return redirect()->back()->with('success','User Assignment Process Completed Successfully..');
    }

    public function login(Request $request){
        $request->validate([
            'email' => "required|email",
            'password' => 'required'
        ],[
            'email.required' => 'Email Address is Required',
            'email.email' => 'Invalid Email Address is Required',
            'password.required' => "Password is Required"
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('dashboard');
        }

        else {
            return redirect()->back()->with('error','Invalid Username or Password');
        }
    }

    public function profile(){
        return true;
    }
}
