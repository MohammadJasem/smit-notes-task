<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
//----------------------------------------------------------------------------//
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'comment'       =>  'required|max:1000'
        ]);
        $data = $request->all();
        Comment::create($data);

        return redirect()->back();
    }
//----------------------------------------------------------------------------//
}
