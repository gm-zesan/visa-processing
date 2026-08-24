<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['delete']]);
    }

    
    public function index(Request $request){
        if ($request->ajax()) {
            $auth_user = Auth::user();
            if ($auth_user->hasRole('superadmin')) {
                $users = User::get()->all();
            } elseif ($auth_user->hasRole('developer')) {
                $users = User::whereHas('roles', function ($query) {
                    return $query->where('name','!=', 'superadmin');
                })->where('id','!=',$auth_user->id)->get()->all();
            } else {
                $users = User::whereHas('roles', function ($query) {
                    return $query->where('name','!=', 'superadmin')->where('name','!=', 'developer');
                })->where('id','!=',$auth_user->id)->get()->all();
            }
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.users.index');
    }


    public function create(){
        return view('admin.users.create');
    }


    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:40',
            'email' => 'required|max:100|unique:users',
            'phone_no' => 'required|max:100|unique:users',
        ], [
            'name.required' => 'your name is required',
            'name.max' => 'your name should be less than 40 characters',
            'email.required' => 'your email is required',
            'email.max' =>  'your email should be less than 100 characters',
            'email.unique' =>  'your email should be unique',
            'phone_no.required' => 'your phone number is required',
            'phone_no.max' =>  'your mobile should be less than 100 characters',
            'phone_no.unique' =>  'your mobile should be unique',
        ]);
        $data = $request->all();

        if($data['cover_image_data'] != "") {
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            ], [
                'image.image' => 'image is not valid',
                'image.mimes' => 'image type not supported',
                'image.max' => 'image size should be less than 2MB',
            ]);
            $image = $request->file('image');
            $destinationPath = 'upload/user-image/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }

        if (!empty($request->password) && (isset($request->password))) {
            $this->validate($request, [
                'password' => [
                    'min:8',
                    'regex:/[a-z]/',
                    'regex:/[A-Z]/',
                    'regex:/[0-9]/',
                    'confirmed',
                ],
            ], [
                'password.min' =>  'min char 8',
                'password.regex' =>  'password must contain at least one uppercase letter, one lowercase letter, and one number',
            ]);
            $data['password'] = bcrypt($request->password);
        }

        $user = User::create($data);
        // $user->assignRole($request->input('roles'));
        $user->assignRole('user');

        return redirect()->route('users')->with('message','User created successfully');
    }










    public function edit($id){
        $auth_user = Auth::user();
        $user = User::find($id);
        if ($user->hasRole('superadmin') && $auth_user->id != $user->id) {
            return redirect()->route('users');
        }

        return view('admin.users.edit',[
            'user'=>$user,
        ]);
    }


    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:40',
            'email' => 'required|max:100|unique:users,email,'.$id,
            'phone_no' => 'required|max:100|unique:users,phone_no,'.$id,
        ], [
            'name.required' => 'your name is required',
            'name.max' => 'your name should be less than 40 characters',
            'email.required' => 'your email is required',
            'email.max' =>  'your email should be less than 100 characters',
            'email.unique' =>  'your email should be unique',
            'phone_no.required' => 'your phone number is required',
            'phone_no.max' =>  'your mobile should be less than 100 characters',
            'phone_no.unique' =>  'your mobile should be unique',
        ]);
        $data = $request->all();
        $old_data = User::find($id);

        if($data['cover_image_data'] != ""){
            $image = $request->file('image');
            $destinationPath = 'upload/user-image/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
            if($old_data->image){
                if (file_exists(public_path($old_data->image)) && $old_data->image != null) {
                    unlink(public_path($old_data->image));
                }
            }
        }
        // image is nullable so we have to check if image is empty or not

        if (!empty($request->password) && (isset($request->password))) {
            $this->validate($request, [
                'password' => [
                    'min:8',
                    'regex:/[a-z]/',
                    'regex:/[A-Z]/',
                    'regex:/[0-9]/',
                    'confirmed',
                ],
            ], [
                'password.min' =>  'min char 8',
                'password.regex' =>  'password must contain at least one uppercase letter, one lowercase letter, and one number',
            ]);
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $old_data->password;
        }

        $old_data->update($data);
        return redirect()->route('users')->with('message','User updated successfully');
    }

    public function delete($id){
        $old_data = User::find($id);
        if (file_exists(public_path($old_data->image)) && $old_data->image != null) {
            unlink(public_path($old_data->image));
        }
        User::find($id)->delete();
        return redirect()->route('users')->with('message','User deleted successfully');
    }
}
