@extends('admin.layouts.app')
@section('title', 'roles')
@section('content')
    <div class="card">
        @if(session('message'))
            <div>{{ session('message') }}</div>
        @endif
        <h1>
            Role list
        </h1>
        <div>
            <a href="{{ route('roles.create') }}" class="btn btn-primary">Create</a>
        </div>
        <div>
            <table class="table table-hover">
                <th>#</th>
                <th>Name</th>
                <th>DisplayName</th>

                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id}} </td>
                        <td>{{ $role->name}}</td>
                        <td>{{ $role->display_name}}</td>
                        <td>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">edit</a>
                            <form action="{{ route('roles.destroy', $role->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $roles->links()}}
        </div>
    </div>
@endsection