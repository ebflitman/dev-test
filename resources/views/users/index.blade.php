@extends('layouts.master')

@section('style')
    <style>
        .data-table
        {
            margin: 0 25px auto;
        }
    </style>

@endsection

@section('title')
    User Administration
@endsection

@section('content')
    <div class="data-table">
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <td><a href="/user/create" type="button" class="btn btn-primary">Create</a></td>
            </tr>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">EncPass</th>
                <th scope="col">Updated</th>
                <th scope="col">Created</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ substr($user->password,0,20) }}</td>
                    <td>{{ $user->updated_at->format('M d, Y h:ia e') }}</td>
                    <td>{{ $user->created_at->format('M d, Y h:ia e') }}</td>
                    <td nowrap>
                        <a href="/user/{{ $user->id }}/edit" type="button" class="btn btn-primary"
                           data-toggle="tooltip" data-placement="top" title="Edit User"> <i
                                class="fas fa-edit"></i></a>
                        <a href="/user/{{ $user->id }}/delete" type="button" class="btn btn-danger"
                           data-toggle="tooltip" data-placement="top" title="Delete User"> <i
                                class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Drill for more information maybe...
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(() =>
        {
            $('[data-toggle="tooltip"]').tooltip();

            $(document).on('click', 'tbody tr', () =>
            {
                $('#exampleModalLong').modal('toggle');
            });
        });
    </script>
@endsection
