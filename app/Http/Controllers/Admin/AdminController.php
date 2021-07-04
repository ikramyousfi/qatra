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
            'email.exists' => "Cet email n'existe pas 🥲"
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Mot de passe incorrect 🤬');
        }
    }

    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->back();
    }

    function displayuser()
    {
        $data = User::all();
        return view('dashboard.admin.usertable', ['key' => $data]);
    }

    function displaygs()
    {
        $value = Gestionnaire::all();
        return view('dashboard.admin.gstable', ['cle' => $value]);
    }


    function deleteuser($id)
    {

        $users = User::findOrfail($id);
        $users->delete();
        return redirect('/admin/userT')->with('message', "L'utilisateur a été supprimé ");
    }

    function deletegs($id)
    {
        $gs = Gestionnaire::findOrfail($id);
        $gs->delete();
        DB::table('stocks')->where('gestionnaire_id', $id)->delete();
        DB::table('notifications')->where('gestionnaire_id', $id)->delete();
        return redirect('/admin/gsT')->with('message', "Le gestionnaire a été supprimé ");
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


        return redirect('/admin/userT')->withMessage("L'utilisateur a été banni / débanni");
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


        return redirect('/admin/gsT')->withMessage("Le gestionnaire a été banni / débanni");
    }

    function update(UpdateProfileRequest $request)
    {
        $admin = Admin::find(1);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect()->back()->with('message', "Votre profile a été mis a jour");
    }

    function messages()
    {
        $data = DB::table('messages')->get();
        return view('dashboard.admin.messages', compact('data'));
    }

    function inbox($id)
    {
        $data = DB::table('messages')->where('id', $id)->get();
        return view('dashboard.admin.inbox', compact('data'));
    }

    function deleteMessage($id)
    {
        $query = DB::table('messages')->where('id', $id)->delete();
        return redirect('/admin/inbox')->with('mes', 'Le message a été supprimé');
    }
}
