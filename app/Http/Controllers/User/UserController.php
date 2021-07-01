<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Event;
use App\Models\Gestionnaire;
use App\Models\Notifications;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{

    //    public function __construct()
    //    {
    //        $this->middleware('auth:user');
    //    }

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

    function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate(
                    'end',
                    '<=',
                    $request->end
                )
                ->get(['id', 'title', 'start', 'end', 'count']);
            return response()->json($data);
        }
        return view('dashboard.user.full-calender');
    }

    function action(Request $request)
    {
        if ($request->ajax()) {
            if (
                $request->type == 'update'
            ) {
                $event = Event::find($request->id)->update([
                    'count' => $request->count
                ]);

                return response()->json($event);
            }
        }
    }

    function create(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'region' => 'required',
            'groupe_sanguin' => 'required',
            'numero_de_telephone' => 'required',
            'password' => 'required|min:5|max:30',
            'password-confirm' => 'required|min:5|max:30|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->region = $request->region;
        $user->groupe_sanguin = $request->groupe_sanguin;
        $user->sexe = $request->sexe;
        $user->numero_de_telephone = $request->numero_de_telephone;
        $user->image = 'profile/profilepicture.png';
        $user->password = Hash::make($request->password);

        $save = $user->save();

        if ($save && Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.home');
        } else {
            return redirect()->back()->with('fail', "Oups, un problème est survenus ");
        }
    }

    function check(Request $request)
    {
        //Validate inputs
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30',

        ], [
            'email.exists' => "Cet email n'existe pas 🥲"
        ]);

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('web')->user()->IsBan == 1) {
                Auth::guard('web')->logout();
                return redirect()->route('user.login')->with('fail', ' Oops, vous avez ete bani 😬');
            } else {
                return redirect()->route('user.home');
            }
        } else {
            return redirect()->route('user.login')->with('fail', 'Mot de passe incorrect 🤬');
        }
    }

    function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->back();
    }


    function notifications()
    {
        $data = array(DB::table('notifications')
            ->where('groupe_sanguin', (Auth::guard('web')->user()->groupe_sanguin))
            ->get());
        $notifs = [];
        for ($i = 0; $i < sizeof($data[0]); $i++) {
            $notifs[$i]["id"] = $data[0][$i]->id;
            $notifs[$i]["ges_id"] = $data[0][$i]->gestionnaire_id;
            $notifs[$i]["grp"] = $data[0][$i]->groupe_sanguin;
            $notifs[$i]["date"] = $data[0][$i]->created_at;
            $gesInfos = Gestionnaire::find($notifs[$i]["ges_id"]);
            $notifs[$i]["username"] = $gesInfos->username;
            $notifs[$i]["adresse"] = $gesInfos->adresse;
            $notifs[$i]["region"] = $gesInfos->region;
            $notifs[$i]["link"] = $gesInfos->link;
            $notifs[$i]["email"] = $gesInfos->email;
            $notifs[$i]["telephone"] = $gesInfos->numero_de_telephone;
        }

        // dd(compact('notifs'));
        return view('dashboard.user.notifications', compact('notifs'));
    }

    function edit(User $user)
    {
        return view('dashboard.user.edit');
    }

    function reserve(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end', 'count']);
            return response()->json($data);
        }
        return view('dashboard.user.calendar');
    }


    function g($id)
    {
        $data = DB::table('gestionnaires')->where('id', $id)->get(['username', 'adresse', 'region', 'link', 'numero_de_telephone', 'email'])->toArray();

        return view('dashboard.user.g', compact('data'));
    }

    function updateInfos()
    {
        $data = request()->validate([
            'name' => 'required',
            'prenom' => 'required',
            'region' => 'required',
            'numero_de_telephone' => 'required',
            'groupe_sanguin' => 'required',
            'adresse' => 'required',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(request()->file('image')->getRealPath())->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }


        auth()->user()->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        //Auth::user()->update($data);
        DB::table('users')->where('id', Auth::user()->id)->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect('user/home');
    }
}
