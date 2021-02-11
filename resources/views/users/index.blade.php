@extends('layouts.master')

@section('title')
    User Administration
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <table class="table">
                <thead>
                <tr>
                    <td colspan="3"><a href="/user/create" type="button" class="btn btn-primary">Create</a></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Verified</th>
                    <th>Last Updated</th>
                    <th>Created</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->verified }}</td>
                        <td>{{ $user->updated_at->format('M d, Y h:ia e') }}</td>
                        <td>{{ $user->created_at->format('M d, Y h:ia e') }}</td>
                        <td>
                            <a href="/user/{{ $user->id }}/edit" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit User"> <i
                                    class="fas fa-edit"></i></a>
                            <a href="/user/{{ $user->id }}/delete" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete User"> <i
                                    class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(() =>
        {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
