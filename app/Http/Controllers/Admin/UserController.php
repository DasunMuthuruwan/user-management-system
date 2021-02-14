<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(Gate::denies('logged-in')){
        //     dd('No access');
        // }
        // if(Gate::allows('is-admin')){
            return view('admin.users.index',['users' => User::orderBy('id','desc')->paginate(10)]);
        // }
        // dd('you want to be admin');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create',['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $newUser = new CreateNewUser();
        //create request for validate data
        // $validateData = $request->messages();

        $user = $newUser->create($request->only(['fname','lname','email','password','password_confirmation']));
        $user->roles()->sync($request->roles);
        
        Password::sendResetLink($request->only(['email']));
        $request->session()->flash('success','User create Successfully');

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('admin.users.edit',[
            'roles' => Role::all(),
            'user' => User::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        $validateData = Validator::make($request->all(),[
                        'fname' => ['required', 'string', 'max:50'],
                        'lname' => ['required', 'string', 'max:50'],
                        'email' => [
                            'required',
                            'string',
                            'email',
                            'max:255',
                        ]
                        ],User::messages())->validated();

        if(!$user){
            $request->session()->flash('error','You can not edit this user');
            return redirect(route('admin.users.index'));
        }
        $user->update($validateData);
        $user->roles()->sync($request->roles);

        $request->session()->flash('success','User updated successfully');
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        //delete user
        User::destroy($id);
        $request->session()->flash('success','User deleted successfully');
        return redirect(route('admin.users.index'));
    }
}
