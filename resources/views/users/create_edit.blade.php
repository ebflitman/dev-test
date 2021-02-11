@extends('layouts.master')

@section('title')
    User Create
@endsection
@section('style')
    <style>
        .form-container
        {
            padding: 1.5rem;
            border-width: 1px;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            margin: 0 auto;
            width: 400px;


    </style>
@endsection
@section('content')
    <div class="form-container">
        <form method="post" action="{{ $data['action'] }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="{{ old('name') ?: ($data['user'] ? $data['user']->name : '') }}" />
                <div id="nameHelp" class="form-text">Enter user's name.</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') ?: ($data['user'] ? $data['user']->email : '') }}" />
                <div id="emailHelp" class="form-text">Enter user's email address.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}" />
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/" type="button" class="btn btn-default">Cancel</a>
        </form>
    </div>
@endsection
