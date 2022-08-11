<?php

namespace App\Http\Controllers\Conf;

use DB;
use Hash;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;



class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:user-list|adm-list', ['only' => ['index']]);
         $this->middleware('permission:adm-create|user-create', ['only' => ['create','store']]);
         $this->middleware('permission:adm-edit|user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:adm-delete|user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = User::where('name', '<>', 'Admin')->orderBy('id','ASC')->paginate(5);

        return view('conf.users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = Role::where('name', '<>', 'Super-Admin')->pluck('name','name')->all();


        return view('conf.users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    public function profile($id){

        $user = User::find($id);
        return view('conf.users.profile',compact('user'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('conf.users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('conf.users.edit',compact('user','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                    ->with('message','Data added Successfully');
    }


}
