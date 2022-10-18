<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use App\Models\Form;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use App\Exports\AktivitasUserExport;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserManagementController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_name == 'Super Admin') {
            $edit = 1;
            $users = DB::table('users')->orderBy('id', 'desc')->get();
            return view('usermanagement.index', compact('users', 'edit'));
        } else {
            return redirect()->route('home');
        }
    }

    // add new user
    public function createUser()
    {
        return view('usermanagement.add_new_user');
    }

    // save new user
    public function storeUser(Request $request)
    {

        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'telepon'     => 'required',
            'role_name' => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = new User;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->telepon      = $request->telepon;
        $user->role_name    = $request->role_name;
        $user->password     = Hash::make($request->password);

        $user->save();

        return back()->with('success', 'Create user successfully');
    }

    // public function editUser($id)
    // {
    //     $data = User::findOrFail($id);
    //     return view('usermanagement.edit', compact('data'));
    // }

    // view detail 
    // public function viewDetail($id)
    // {  
    //     if (Auth::user()->role_name=='Super Admin')
    //     {
    //         $data = DB::table('users')->where('id',$id)->get();
    //         $roleName = DB::table('role_type_users')->get();
    //         $userStatus = DB::table('user_types')->get();
    //         return view('usermanagement.view_users',compact('data','roleName','userStatus'));
    //     }
    //     else
    //     {
    //         return redirect()->route('main_dashboard');
    //     }
    // }

    // update
    public function updateUser(Request $request)
    {
        $id           = $request->id;
        $name         = $request->name;
        $email        = $request->email;
        $telepon = $request->telepon;
        $role_name    = $request->role_name;

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();


        $update = [

            'id'           => $id,
            'name'         => $name,
            'email'        => $email,
            'telepon'      => $telepon,
            'role_name'    => $role_name,
        ];

        $activityLog = [

            'name'         => $role_name,
            'email'        => $email,
            'telepon'      => $telepon,
            'description'  => 'Update user',
            'date_time'    => $todayDate,
        ];

        DB::table('activity_logs')->insert($activityLog);
        User::where('id', $request->id)->update($update);

        return back()->with('success', 'Update user successfully');
    }

    // delete
    public function destroyUser($id)
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user = Session::get('user');

        $name         = $user->name;
        $email        = $user->email;
        $telepon      = $user->telepon;
        $role_name    = $user->role_name;

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $activityLog = [

            'name'         => $role_name,
            'email'        => $email,
            'telepon'      => $telepon,
            'description'  => 'Delete User',
            'date_time'    => $todayDate,
        ];

        DB::table('activity_logs')->insert($activityLog);

        $delete = User::find($id);
        $delete->delete();

        return back()->with('success', 'Delete user successfully');
    }

    // view change password
    public function changePasswordView()
    {
        return view('usermanagement.change_password');
    }

    // change password in db
    public function changePasswordDB(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        return back()->with('success', 'Change password user successfully');
    }




    // activity log
    public function activity()
    {
        $activityLog = DB::table('activity_logs')->orderBy('created_at', 'desc')->get();
        return view('usermanagement.activity_log', compact('activityLog'));
    }

    public function activityExcel()
    {
        return Excel::download(new AktivitasUserExport(), 'aktivitas-user.xlsx');
    }



    // use activity log
    public function activityLog()
    {
        $activityLog = DB::table('user_activity_logs')->get();
        return view('usermanagement.user_activity_log', compact('activityLog'));
    }


    // profile user
    public function profile()
    {
        return view('usermanagement.profile_user');
    }
}