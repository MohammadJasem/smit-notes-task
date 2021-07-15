@extends('layouts.master')

@section('title', 'View Note ('.$note->title.')')

@section('content')

    <div class="container" style="margin-top: 7rem!important;">
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        {{$note->title}}
                        <div>{{$note->created_at->diffForHumans()}}</div>
                    </div>
                    <div class="card-body">
                        <div>
                            {{$note->note}}
                        </div>
                    </div>
                </div>
                @if(auth()->user() !== null)
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{url('comments')}}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                        <input type="hidden" name="note_id" value="{{$note->id}}">

                                        <div class="form-group mt-15">
                                            <label>Comment</label>
                                            <textarea name="comment" class="form-control" placeholder="Your comment here" rows="8" required></textarea>
                
                                            @error('comment')
                                                <span class="invalid-feedback error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group rounded-buttons mt-20">
                                            <button type="submit" class="main-btn rounded-three">Post</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="mt-45">
                    <h3>Comments</h3>
                    @if($comments->isNotEmpty())
                        @foreach($comments as $comment)
                            <div class="card mt-20">
                                <div class="card-header">
                                    <div>By: {{$comment->user->name}}</div>
                                    <div>Created: {{$comment->created_at->diffForHumans()}}</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            {{$comment->comment}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>Be the firt to comment on this note</p>
                    @endif
                </div>

            </div>
        </div>
    </div>

@endsection