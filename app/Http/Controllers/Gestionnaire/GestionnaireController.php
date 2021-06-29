<?php

namespace App\Http\Controllers\Gestionnaire;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdateProfileRequest;
use Illuminate\Support\Facades\DB;

use App\Models\Gestionnaire;
use App\Models\Notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Component\VarDumper\VarDumper;
use Illuminate\Support\Carbon;

class GestionnaireController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //    public function index()
    //    {
    //
    //        return view('home');
    //    }

    function create(Request $request)
    {
        //Validate inputs
        $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:gestionnaires,email',
            'username' => 'required|unique:gestionnaires',
            'region' => 'required',
            'numero_de_telephone' => 'required|size:10',
            'adresse' => 'required',
            'link' => 'required',
            'password' => 'required|min:5|max:30',
            'password-confirm' => 'required|min:5|max:30|same:password',
        ], [
            'numero_de_telephone.size' => 'Veillez entrer un numero de telephone valide'
        ]);


        $ges = new Gestionnaire();
        $ges->name = $request->name;
        $ges->email = $request->email;
        $ges->username = $request->username;
        $ges->prenom = $request->prenom;
        $ges->region = $request->region;
        $ges->numero_de_telephone = $request->numero_de_telephone;
        $ges->adresse = $request->adresse;
        $ges->link = $request->link;
        $ges->password = Hash::make($request->password);

        $save = $ges->save();

        if ($save && Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('gestionnaire.home');
        } else {
            return redirect()->back()->with('fail', 'Something went Wrong, failed to register');
        }
    }

    function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'email' => 'required|email|exists:gestionnaires,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists in gestionnaires table'
        ]);

        if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('doctor')->user()->IsBan == 1) {
                Auth::guard('doctor')->logout();
                return redirect()->route('gestionnaire.login')->with('fail', ' Oops, You been banned');
            } else {
                return redirect()->route('gestionnaire.home');
            }
        } else {
            return redirect()->route('user.login')->with('fail', ' Oops, wrong password ');
        }
    }

    function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect()->back();
    }

    function stock()
    {
        $data = array(DB::table('stocks')->where('id', Auth::guard('doctor')->user()->id)->first());
        return view('dashboard.gestionnaire.stock', compact('data'));
    }

    function addNotification(Request $request)
    {
        // dd($request->input('adresse'));
        foreach (array_slice($request->all(), 1, 8) as $key => $value) {
            if ($value < 30) {
                DB::table('notifications')->insert([
                    'region' => $request->input('region'),
                    'gestionnaire_id' => $request->input('id'),
                    'numero_de_telephone' => $request->input('numero_de_telephone'),
                    'adresse' => $request->input('adresse'),
                    'username' => $request->input('username'),
                    'groupe_sanguin' => $key,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        return redirect()->back();
    }

    function updateStock(Request $request)
    {
        // dd($request->all("ABp"));
        DB::table('stocks')
            ->where('id', intval($request->input('id')))
            ->update([
                'ABp' => intval($request->input('ABp')),
                'ABn' => $request->input('ABn'),
                'Ap' => $request->input('Ap'),
                'An' => $request->input('An'),
                'Bp' => $request->input('Bp'),
                'Bn' => $request->input('Bn'),
                'Op' => $request->input('Op'),
                'On' => $request->input('On')
            ]);
        return redirect()->back();
    }

    function notifications()
    {
        $data = array(DB::table('notifications')->where('gestionnaire_id', (Auth::guard('doctor')->user()->id))->get());

        return view('dashboard.gestionnaire.notifications', compact('data'));
    }

    public function deleteNotif($id)
    {

        $notif = Notifications::findOrfail($id);
        $notif->delete();
        return redirect()->back()->with('message', 'Success your notification has been deleted');
    }

<<<<<<< HEAD
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end', 'count']);
            return response()->json($data);
        }
        return view('dashboard.gestionnaire.full-calender');
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            if ($request->type == 'add') {
                $event = Event::create([
                    'title'        =>    $request->title,
                    'start'        =>    $request->start,
                    'end'        =>    $request->end,
                    'count'        =>    $request->count
                ]);

                return response()->json($event);
            }

            if ($request->type == 'update') {
                $event = Event::find($request->id)->update([
                    'title'        =>    $request->title,
                    'start'        =>    $request->start,
                    'end'        =>    $request->end,
                    'count'        =>    $request->count
                ]);

                return response()->json($event);
            }

            if ($request->type == 'delete') {
                $event = Event::find($request->id)->delete();

                return response()->json($event);
            }
        }
    }

    function update(UpdateProfileRequest $request)
=======
    function updateInfos()
>>>>>>> commit
    {
        $data = request()->validate([
            'name' => 'required',
            'prenom' => 'required',
            'username' => 'required',
            'region' => 'required',
            'numero_de_telephone'=>'required',
            'adresse'=>'required',
            'link'=>'required',
            'email'=>'required',
        ]);

<<<<<<< HEAD
        $ges = Auth::guard('doctor')->user();
        

        $ges->update([
=======
       
        DB::table('gestionnaires')->where('username', Auth::user()->username)->update($data);
>>>>>>> commit

        return redirect('gestionnaire/home');
    }
}
