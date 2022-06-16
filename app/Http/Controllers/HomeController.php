<?php

namespace App\Http\Controllers;

use App\Message;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $messages = Message::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(2);

        return view('home', [
            'messages' => $messages,
        ]);
    }
}
