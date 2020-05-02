<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home(){
        $userID = Auth::id();
        $status = Status::where('user_id', $userID)->orderBy('id', 'desc')->get();
        $avater = empty( Auth::user()->avater ) ? asset('image/avater.png') : Auth::user()->avater;
        return view('welcome', ['status'=> $status, 'avater' => $avater]);
    }

    public function saveStatus(Request $request){
        if(Auth::check()){
            $status = $request->post('statusarea');
            $userID = Auth::id();

            $statusModel = new Status();
            $statusModel->status = $status;
            $statusModel->user_id = $userID;
            $statusModel->save();
            return redirect()->route('shout');
        }
    }

    public function profile(){
        return view('profile');
    }

    public function saveProfile(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $user->name = $request->post('name');
            $user->email = $request->post('email');
            $user->nickname = $request->post('nickname');

            $profileImage ='user_'.$user->id. '.'. $request->image->extension();
            $request->image->move(public_path('images', $profileImage));
            $user->avater = asset("images/{$profileImage}");

            $user->save();
            return redirect()->route('profile');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
