@extends('layouts.master')

@section('title', 'Paste Note')

@section('content')

    <div class="container" style="margin-top: 7rem!important;">
        <div class="row row justify-content-center">
            <div class="col">
                <div class="contact-form form-style-one mt-35 wow fadeIn">
                    <form method="post" action="{{url('notes')}}">
                        @csrf

                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                
                        <div class="form-group mt-15">
                            <label>Title</label>
                            <input type="text" placeholder="Title" name="title" class="form-control" required autofocus>

                            @error('title')
                                <span class="invalid-feedback error" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-15">
                            <label>Visibility</label>
                            <input type="radio" name="visible_mode" value="public" checked> Public
                            <input type="radio" name="visible_mode" value="private"> Private
                        </div>
                
                        <div class="form-group mt-15">
                            <label>Language</label>
                            <select name="language" class="form-control" required>
                                <option value="plain">Plain Text</option>
                                <option value="php">PHP</option>
                                <option value="python">Python</option>
                                <option value="c#">C#</option>
                                <option value="c++">C++</option>
                                <option value="java">Java</option>
                                <option value="bash">Bash</option>
                            </select>

                            @error('language')
                                <span class="invalid-feedback error" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group mt-15">
                            <label>Note</label>
                            <textarea name="note" class="form-control" placeholder="Paste your note here" rows="8" required></textarea>

                            @error('note')
                                <span class="invalid-feedback error" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group rounded-buttons mt-20">
                            <button type="submit" class="main-btn rounded-three">Paste</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   

@endsection