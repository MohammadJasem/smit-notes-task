@extends('layouts.master')

@section('title', 'My Notes')

@section('content')

    <div class="container" style="margin-top: 7rem!important;">
        @foreach($notes as $note)
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <a href="{{url('notes/view/'.$note->slug)}}">{{$note->title}}</a>
                                <a href="{{url('notes/'.$note->id.'/edit')}}" class="float-right">Edit</a>
                            </div>
                            <div>{{$note->created_at->diffForHumans()}}</div>
                        </div>
                        <div class="card-body">
                            {{$note->getShortNote()}}
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

        <div class="row mt-35">
            <div class="col">
                {{ $notes->links() }}
            </div>
        </div>
    </div>

@endsection