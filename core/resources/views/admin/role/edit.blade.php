@extends('admin.layout.master')
@section('role', 'active')
@section('Role Management', 'open')
@section('title')
    @lang('admin_role.edit_page_title')
@endsection
@section('content')
    <div class="table-area">
        <div class="row">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif

            {!! Form::open(['route' => ['admin.role.update', $role->id], 'method' => 'post']) !!}
            @csrf
            <div class="col-lg-12">
                <div class="table-wrapper table-responsive">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><strong>Role Name :</strong></label>
                                    <div class="controls">
                                        {!! Form::text('role_name', $role->role_name, [
                                            'class' => 'form-control form--control',
                                            'data-validation-required-message' => 'This field is required',
                                            'placeholder' => 'Enter group name',
                                        ]) !!}
                                    </div>
                                    @if ($errors->has('role_name'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('role_name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $assigned_perms = explode(',', $role->permission->permissions ?? '');
                    @endphp

                    <table class="custom-table small">
                        <thead>
                            <tr class="custom-table-row">
                                <th>Menu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $group)
                                <tr>
                                    <td>{{ $group->group_name }}</td>
                                    <td>
                                        <div class="custom-check-group me-3">
                                            @foreach ($group->permissions as $i => $permissions)
                                                @if (in_array($group->permissions[$i]->name, $assigned_perms) && $group->permissions[$i]->name != '')
                                                    <input name="permission[]" type="checkbox" checked="checked"
                                                        value="{{ $group->permissions[$i]->name }}" id="input-{{ $group->permissions[$i]->name }}">
                                                    <label for="input-{{ $group->permissions[$i]->name }}">{{ $group->permissions[$i]->display_name }}</label>&nbsp; &nbsp;
                                                @else
                                                    <input name="permission[]" type="checkbox"
                                                        value="{{ $group->permissions[$i]->name }}" id="{{ $group->permissions[$i]->name }}">
                                                    <label for="{{ $group->permissions[$i]->name }}">{{ $group->permissions[$i]->display_name }}</label>&nbsp; &nbsp;
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-2">
                    <a href="{{ route('admin.role') }}">
                        <button type="button" class="btn btn--base bg--danger">
                            Cancel
                        </button>
                    </a>
                    <button type="submit" class="btn btn--base text-white btn-block">
                        Save changes
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
