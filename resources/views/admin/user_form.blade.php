@extends('layouts.system')

@section('content')
<div class="card">
    <div class="card-header">User Details</div>
    <div class="card-body">
        @if($user->id) 
            <form action="{{ route('app.admin.user.update', $user->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
        @else
            <form action="{{ route('app.admin.user.store') }}" method="post">
            <input type="hidden" name="_method" value="POST">
        @endif
        @csrf
        <table class="table">
            <tr>
                <th>Name</th>
                <td>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}"> <!-- old - nk get back old value dari yg dh save to db !-->
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <th>Staff ID</th>
                <td>
                    <input type="text" class="form-control" name="staff_id" value="{{ old('staff_id', $user->staff_id) }}">
                    @error('staff_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <th>Deparment</th>
                <td>
                    <input type="text" class="form-control" name="department" value="{{ old('department', $user->department) }}">
                    @error('department')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <th>Password</th>
                <td>
                    <input type="text" class="form-control" name="password">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <th>Password Confirm</th>
                <td>
                    <input type="text" class="form-control" name="password_confirmation">
                    @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <th>Role</th>
                <td>
                    <select class="form-control" name="role">
                        <option value="user" @if(old('role', $user->role) == 'user') selected @endif>User</option>
                        <option value="admin" @if(old('role', $user->role) == 'admin') selected @endif>Admin</option>
                    </select>
                    @error('role')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
        </table>
            <a href="{{ route('app.admin.user.index') }}" class="btn btn-info">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection