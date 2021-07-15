@extends('layouts.master')

@section('title', 'Edit Note ('.$note->title.')')

@section('content')

    <div class="container" style="margin-top: 7rem!important;">
        <div class="row row justify-content-center">
            <div class="col">
                <div class="contact-form form-style-one mt-35 wow fadeIn">
                    @if($note->user_id == auth()->user()->id)
                        <form method="post" action="{{url('notes/'.$note->id)}}">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    
                            <div class="form-group mt-15">
                                <label>Title</label>
                                <input type="text" placeholder="Title" value="{{$note->title}}" name="title" class="form-control" required autofocus>

                                @error('title')
                                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-15">
                                <label>Visibility</label>
                                <input type="radio" name="visible_mode" value="public" {{$note->visible_mode=='public' ? 'checked':''}} > Public
                                <input type="radio" name="visible_mode" value="private" {{$note->visible_mode=='private' ? 'checked':''}} > Private
                            </div>
                    
                            <div class="form-group mt-15">
                                <label>Language</label>
                                <select name="language" class="form-control" required>
                                    <option {{$note->language=='plain' ? 'selected':''}} value="plain">Plain Text</option>
                                    <option {{$note->language=='php' ? 'selected':''}} value="php">PHP</option>
                                    <option {{$note->language=='python' ? 'selected':''}} value="python">Python</option>
                                    <option {{$note->language=='c#' ? 'selected':''}} value="c#">C#</option>
                                    <option {{$note->language=='c++' ? 'selected':''}} value="c++">C++</option>
                                    <option {{$note->language=='java' ? 'selected':''}} value="java">Java</option>
                                    <option {{$note->language=='bash' ? 'selected':''}} value="bash">Bash</option>
                                </select>

                                @error('language')
                                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group mt-15">
                                <label>Note</label>
                                <textarea name="note" class="form-control" placeholder="Paste your note here" rows="8" required>{{$note->note}}</textarea>

                                @error('note')
                                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group rounded-buttons mt-20">
                                <button type="submit" class="main-btn rounded-three">Update</button>
                            </div>
                        </form>
                    @else
                        <div class="card-body">
                            <h1>Access denied</h1>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
   

@endsection