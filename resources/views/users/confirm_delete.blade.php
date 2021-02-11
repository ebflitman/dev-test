@extends('layouts.master')


@section('content')
    <div class="text-center" style="padding: 50px;">
        <p>Are you sure you want to delete the user {{ $user->name }}?</p>
        <p>
            <a href="/user/{{ $user->id }}/delete?confirm=true" type="button" class="btn btn-danger">Delete</a>
            <a href="/" type="button" class="btn btn-default">Cancel</a>
        </p>
    </div>
@endsection
