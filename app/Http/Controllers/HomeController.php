<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        if($user === null)
            $notes = Note::where('visible_mode', 'public')->orderBy('created_at', 'desc')->paginate(10);
        else{
            $userId = $user->id;
            $notes = Note::where('visible_mode', 'public')
            ->orWhere('user_id', $userId)->orderBy('created_at', 'desc')->paginate(10);
        }
        return view('notes', compact('notes'));
    }
}
