<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\{
    Department,
    Block,
    Ward,
    Designation
};
use PDO;

class UserController extends Controller
{

    private $blocks,$department,$user,$wards,$designations;

    public function __construct(){
        $this->blocks = Block::pluck('name','id');
        $this->department = Department::pluck('name','id');
        $this->wards = Ward::pluck('name','id');    
        $this->designations = Designation::pluck('name','id');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(User::with('user_block','user_ward','user_department')->get())
                ->addIndexColumn()
                ->addColumn("action", function (User $user) {
                    $btn = '<a href="' . route('users.edit', $user->id) . '" class="edit btn btn-info btn-sm"><i class="md md-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create',[
            'designations' => $this->designations
        ]);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        if($user){
            return redirect()->route('users.index')->with('success','User Registered Successfully..');
        }
    }

    public function assign_designation(){
        
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',[
            'designations' => $this->designations,
            'user' => $user->with('designation')->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.index')->with('success','Users Details Updated Successfully..');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
