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
        return view('welcome', ['status'=> $status]);
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
