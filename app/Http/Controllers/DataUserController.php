<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataUserRequest;
use App\Http\Requests\DataUserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('data-user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataUserRequest $request)
    {
        $input = $request->validated();
        $input['password'] = Hash::make($request['password']);
        User::create($input);
        // Alert::success('Success', 'Create user has been successfully');
        return redirect()->route('data-user.index')->with('success', 'Create user has been successfully');
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
        $user = User::findOrFail($id);
        return view('data-user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DataUserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->validated();

        $user->update($input);
        // Alert::success('Success', 'Update user has been successfully');
        return redirect()->route('data-user.index')->with('success', 'Update user has been successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        // Alert::error('Delete', 'Delete user has been successfully');
        return back()->with('success', 'Delete user has been successfully');
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->update(['password' => Hash::make($request->password)]);

        // Alert::success('Success', 'Change password has been successfully');
        return redirect()->route('data-user.index')->with('success', 'Change password has been successfully');
    }
}