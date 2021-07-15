<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Note;

class NotesController extends Controller {
//----------------------------------------------------------------------------//
    public function __construct(){
        $this->middleware('auth')->except(['index', 'view']);
    }
//----------------------------------------------------------------------------//
    public function index(){
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
//----------------------------------------------------------------------------//
    public function view($slug){
        $note = Note::where('slug', $slug)->first();
        $comments = $note->comments()->orderBy('created_at', 'desc')->get();
        return view('show_note', compact('note', 'comments'));
    }
//----------------------------------------------------------------------------//
    public function create(){
        return view('add_note');
    }
//----------------------------------------------------------------------------//
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id'       =>  'required',
            'title'         =>  'required|max:255',
            'note'          =>  'required',
            'language'      =>  'required',
            'visible_mode'  =>  'required'
        ]);
        $data = $request->all();
        $slug = time() . '-' . Str::random(10);
        $data['slug'] = $slug;
        Note::create($data);

        return redirect('my-notes');
    }
//----------------------------------------------------------------------------//
    public function edit(Note $note){
        return view('edit_note', compact('note'));
    }
//----------------------------------------------------------------------------//
    public function update(Note $note, Request $request){
        $data = $request->all();

        $note->update($data);
        return redirect('my-notes');
    }
//----------------------------------------------------------------------------//
    public function myNotes(){
        $user = auth()->user();
        $userId = $user->id;
        $notes = Note::where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(10);
        return view('my_notes', compact('notes'));
    }
//----------------------------------------------------------------------------//
}
