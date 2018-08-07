<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator, Input, Hash;

class UserController extends Controller
{
    public function ShowUsers()
    {
    	return view('admin.users');
    }

    public function AddNewUser(Request $request)
    {
    	$rules = [
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ];

        $msgs = [
        	'name.required' => 'Complete name is required.',
        	'username.required' => 'Username is required.',
        	'password.required' => 'Password is required.',
        ];

        $validator = Validator::make(Input::all(), $rules, $msgs);

        if($validator->fails()){
            return redirect()->back()
                ->withInput(Input::all())
                ->with('err', 'Error')
                ->withErrors($validator);
        }else{

        	$user = new User;
        	$user->username = $request->username;
        	$user->name = $request->name;
        	$user->password = Hash::make($request->password);
        	$user->account_type = $request->account_type;
        	$user->save();

        return redirect()->back()
            ->with('msg','New User Added.');
        }
    }

    public function UsersList()
    {
        $users = User::all();

        $account_types = [1 => 'Administrator', 2 => 'Clerk', 3 => 'Cashier'];

        $return_array = [];
        foreach($users as $user) {
            $return_array[] = [
                'id' => $user->id,
                'username' => $user->username,
                'name' => $user->name,
                'account_type' => $account_types[$user->account_type],
            ];
        }

        return response()->json(['data' => $return_array]);
    }

    public function User($id)
    {

        $user = User::find($id);

        return view('admin.user')
            ->with('user', $user);
    }

    public function UpdateUser(Request $request, $id)
    {
        $chck_user = "";
        $user = User::find($id);
        
        if($request->username != $user->username){
            $chck_user = "|unique:users";
        }

        $rules = [
            'name' => 'required',
            'username' => 'required'.$chck_user,
        ];

        $msgs = [
            'name.required' => 'Complete name is required.',
            'username.required' => 'Username is required.',
        ];

        $validator = Validator::make(Input::all(), $rules, $msgs);

        if($validator->fails()){
            return redirect()->back()
                ->withInput(Input::all())
                ->with('err', 'Error')
                ->withErrors($validator);
        }else{

            $user->username = $request->username;
            $user->name = $request->name;
            $user->account_type = $request->account_type;
            $user->save();

        return redirect()->back()
            ->with('msg','Changes Saved.');
        }
    }
}
