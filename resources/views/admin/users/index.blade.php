@extends('templates.main')
@section('content')
    <div class="row">
        <div class="col-md-2">
            <h2>Users</h2>
        </div>
        <div class="col-md-8">

        </div>
        <div class="col-md-2">
            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-success float-right" role="button">Create User</a>
        </div>
   </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">FirstName</th>
                    <th scope="col">LastName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="col">{{ $user->id }}</th>
                        <td scope="col">{{ $user->fname }}</td>
                        <td scope="col">{{ $user->lname }}</td>
                        <td scope="col">{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <button class="btn btn-sm btn-danger"
                                onclick="event.preventDefault();
                                document.getElementById('user-delete-form-{{ $user->id }}').submit();">
                                Delete
                            </button>
                            <form action="{{ route('admin.users.destroy', $user->id)}}"
                                id="user-delete-form-{{ $user->id }}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
@endsection
