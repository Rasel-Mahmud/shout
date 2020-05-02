<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Status;
use App\User;
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

    public function profileTimeline($nickname){
        $user = User::where('nickname', $nickname)->first();
        if($user){
            $status = Status::where('user_id', $user->id)->orderBy('id', 'desc')->get();
            $avater = empty( Auth::user()->avater ) ? asset('image/avater.png') : Auth::user()->avater;
            $name = $user->name;
            $displayaction = false;
            if(Auth::check()){
                if(Auth::user()->id != $user->id){
                    $displayaction = true;
                }
            }
            return view('timeline', ['status'=> $status,
                                    'avater' => $avater,
                                    'name' => $name,
                                    'displayaction' => $displayaction,
                                    'friendID' => $user->id
                                    ]);
        }else{
            return redirect('/');
        }
    }

    public function makeFriend($friendID){
        $userID = Auth::user()->id;
        
        if(Friend::where('user_id', $userID)->where('friend_id', $friendID)->count() == 0){
            $friendShip = new Friend();
            $friendShip->user_id = $userID;
            $friendShip->friend_id = $friendID;
            $friendShip->save();
        
            $friendShip = new Friend();
            $friendShip->friend_id = $userID;
            $friendShip->user_id = $friendID;
            $friendShip->save();
        }

        return redirect()->route('shout');
    }

    public function unFriend($friendID){
        $userID = Auth::user()->id;
        Friend::where('user_id', $userID)->where('friend_id', $friendID)->delete();
        Friend::where('friend_id', $userID)->where('user_id', $friendID)->delete();
        return redirect()->route('shout');
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
