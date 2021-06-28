<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gestionnaire;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists in admins table'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
        }
    }

    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->back();;
    }

    public function displayuser()
    {
        //        if(Auth::user()->role == 'admin')
        $data = User::all();

        return view('dashboard.admin.usertable', ['key' => $data]);
    }

    public function displaygs()
    {
        //        if(Auth::user()->role == 'admin')
        $value = Gestionnaire::all();

        return view('dashboard.admin.gstable', ['cle' => $value]);
    }


    function deleteuser($id)
    {

        $users = User::findOrfail($id);
        $users->delete();
        return redirect('/admin/userT')->with('message', 'Success your data has been deleted');
    }

    function deletegs($id)
    {
        $gs = Gestionnaire::findOrfail($id);
        $gs->delete();
        return redirect('/admin/gsT')->with('message', 'Success your data has been deleted');
    }

    function changestatus($id)
    {
        $user = User::find($id);

        if ($user->IsBan == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        $values = array('IsBan' => $status);
        DB::table('users')->where('id', $id)->update($values);


        return redirect('/admin/userT')->withMessage('It has been changed successfully');
    }

    function changestatusgs($id)
    {
        $gs = Gestionnaire::find($id);

        if ($gs->IsBan == '1') {
            $state = '0';
        } else {
            $state = '1';
        }

        $vals = array('IsBan' => $state);
        DB::table('gestionnaires')->where('id', $id)->update($vals);


        return redirect('/admin/gsT')->withMessage('It has been changed successfully');
    }

    //    public function edit(){
    //       return view('dashboard.admin.home');
    //
    //    }
    public function update(UpdateProfileRequest $request)
    {
        $admin = Admin::find(1);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect()->back()->with('message', 'You have updated your profile successfully ');
    }

    function messages()
    {
        $data = DB::table('messages')->get();

        // dd($data);
        return view('dashboard.admin.messages', compact('data'));
    }

    function inbox($id)
    {
        $data = DB::table('messages')->where('id', $id)->get();

        // dd($data);  
        return view('dashboard.admin.inbox', compact('data'));
    }

    public function deleteMessage($id)
    {

        $query = DB::table('messages')->where('id', $id)->delete();

        return redirect()->back()->with('message', 'Success the message has been deleted');
    }
}

















//    public function getAllAdmins(){
//        $admins = DB::table('Admins',)->get();
//        return view('admin', compact($admins));
//    }
//
//    public function acceptGestionnaire(Request $request){
//        $nom = $request->input('nom');
//        $prenom = $request->input('prenom');
//        $nom_de_hopital = $request->input('nom_de_hopital');
//        $numero_de_telephone = $request->input('numero_de_telephone');
//        $email = $request->input('email');
//        $password = $request->input('password');
//        $gest = ['nom' => $nom,
//            'prenom' => $prenom,
//            'nom_de_hopital' => $nom_de_hopital,
//            'numero_de_telephone' => $numero_de_telephone,
//            'email' => $email,
//            'numero_de_telephone' => $password
//            ];
//        DB::table('gestionnaires')->insert($gest);
//
//        return redirect('/admin/requests');
//
//    }
