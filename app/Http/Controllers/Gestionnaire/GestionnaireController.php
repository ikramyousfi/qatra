<?php

namespace App\Http\Controllers\Gestionnaire;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdateProfileRequest;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


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
            'adresse' => 'required|unique:gestionnaires,adresse',
            'link' => 'required|unique:gestionnaires,link',
            'password' => 'required|min:5|max:30',
            'password-confirm' => 'required|min:5|max:30|same:password',
        ], [
            'numero_de_telephone.size' => 'Veuillez entrer un numéro de téléphone valide',
            'email.unique' => 'Cet email est deja pris',
            'username.unique' => 'Cet username est deja pris'
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
        $ges->image = 'profile/profilepicture.png';
        $ges->password = Hash::make($request->password);

        $save = $ges->save();

        if ($save && Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('doctor')->user()->IsBan == 1) {
                Auth::guard('doctor')->logout();
                return redirect()->route('contact')->with('msg', 'Demande d\'inscription')->with('name', $request->name)->with('email', $request->email);
            } else {
                return redirect()->route('gestionnaire.home');
            }
        } else {
            return redirect()->back()->with('fail', "Oups, un problème est survenu ");
        }
    }

    function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'email' => 'required|email|exists:gestionnaires,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => "Cet email n'existe pas 🥲"
        ]);

        if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('doctor')->user()->IsBan == 1) {
                Auth::guard('doctor')->logout();
                return redirect()->route('gestionnaire.login')->with('fail', ' Oops, vous avez ete bani 😬');
            } else {
                return redirect()->route('gestionnaire.home');
            }
        } else {
            return redirect()->route('user.login')->with('fail', 'Mot de passe incorrect 🤬');
        }
    }

    function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect()->back();
    }

    function stock()
    {
        $data = Auth::guard('doctor')->user()->stock;
        return view('dashboard.gestionnaire.stock', compact('data'));
    }

    function addNotification(Request $request)
    {

        $grp = ["AB+", "AB-", "A+", "A-", "B+", "B-", "O+", "O-"];
        $max = ["maxAB+", "maxAB-", "maxA+", "maxA-", "maxB+", "maxB-", "maxO+", "maxO-"];
        $data = (array_slice($request->all(), 1, 16));
        // dd($data);
        for ($i = 0; $i < 8; $i++) {
            if ($data[$grp[$i]] / $data[$max[$i]] < 0.3) {

                DB::table('notifications')->updateOrInsert([
                    'gestionnaire_id' => Auth::guard('doctor')->user()->id,
                    'groupe_sanguin' => $grp[$i]
                ]);
                DB::table('notifications')->where('gestionnaire_id', Auth::guard('doctor')->user()->id)
                    ->where('groupe_sanguin', $grp[$i])->update([
                        'created_at' => Carbon::now()
                    ]);
            }
        }
        return redirect(route('gestionnaire.notifications'))->with('msg', 'Notification envoyée avec succès');
    }

    public function updateStock(Request $request)
    {

        $data = [
            'AB+' => $request->input('AB+'),
            'maxAB+' => $request->input('maxAB+'),
            'AB-' => $request->input('AB-'),
            'maxAB-' => $request->input('maxAB-'),
            'A+' => $request->input('A+'),
            'maxA+' => $request->input('maxA+'),
            'A-' => $request->input('A-'),
            'maxA-' => $request->input('maxA-'),
            'B+' => $request->input('B+'),
            'maxB+' => $request->input('maxB+'),
            'B-' => $request->input('B-'),
            'maxB-' => $request->input('maxB-'),
            'O+' => $request->input('O+'),
            'maxO+' => $request->input('maxO+'),
            'O-' => $request->input('O-'),
            'maxO-' => $request->input('maxO-')
        ];
        Auth::guard('doctor')->user()->stock->update($data);
        return redirect()->back()->with('message', 'Mise à jour réussite');
    }

    function notifications()
    {
        $data = Auth::guard('doctor')->user()->notifications;
        return view('dashboard.gestionnaire.notifications', compact('data'));
    }

    public function deleteNotif($id)
    {

        $notif = Notifications::findOrfail($id);
        $notif->delete();
        return redirect()->back()->with('message', 'Notification supprimée');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
        }
        return view('full-calender');
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            if ($request->type == 'add') {
                $event = Event::create([
                    'title'        =>    $request->title,
                    'start'        =>    $request->start,
                    'end'        =>    $request->end
                ]);

                return response()->json($event);
            }

            if ($request->type == 'update') {
                $event = Event::find($request->id)->update([
                    'title'        =>    $request->title,
                    'start'        =>    $request->start,
                    'end'        =>    $request->end
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
    {
        $data = request()->validate([
            'name' => 'string',
            'prenom' => 'string',
            'region' => 'string',
            'adresse' => 'string',
            'link' => 'string',
            'numero_de_telephone' => 'string|size:10',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(request()->file('image')->getRealPath())->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        $ges = Auth::guard('doctor')->user();

        Auth::guard('doctor')->user()->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        DB::table('gestionnaires')->where('username', Auth::user()->username)->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        return redirect('gestionnaire/home');
    }
}
