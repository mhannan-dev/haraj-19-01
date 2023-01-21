@extends('admin.layout.master')
@section('role', 'active')
@section('Role Management', 'open')
@section('title')
    Role
@endsection
@section('page-name')
    Role Management
@endsection
@section('content')
    <div class="dashboard-title-part">
        <div class="view-prodact">
            <a href="#">
                <i class="las la-arrow-left align-middle me-1"></i>
                <span>Go Back</span>
            </a>
        </div>
        <div class="dashboard-path">
            <span class="main-path">Dashboards</span>
            <i class="las la-angle-right"></i>
            <span class="active-path g-color">New Role</span>
        </div>
        <h5 class="title">New Role</h5>
    </div>
    <!-- body-wrapper-start -->
    <div class="dashboard-form-area">
        {!! Form::open(['route' => 'admin.role.store', 'method' => 'post']) !!}
        @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label for="roles">Role</label>
                    <input class="form-control form--control" placeholder="Enter role name" name="role_name" type="text">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-wrapper table-responsive">
                            <table class="custom-table small">
                                <thead class="text-center">
                                    <tr>
                                        <th>Menu</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($groups as $group)
                                        <tr>
                                            <td>
                                                {{ $group->group_name }}
                                            </td>
                                            @for ($i = 0; $i < 5; $i++)
                                                <div class="custom-check-group me-3">
                                                    <td>
                                                        @if (isset($group->permissions[$i]->name) && $group->permissions[$i]->name != '')
                                                            {{-- <label class="m-checkbox" for="input-15">
                                                            <input name="permission[]" type="checkbox"
                                                                value="{{ $group->permissions[$i]->name }}" id="input-15">
                                                            <span>{{ $group->permissions[$i]->display_name }}</span>
                                                        </label> --}}
                                                            <input name="permission[]" type="checkbox"
                                                                value="{{ $group->permissions[$i]->name }}"
                                                                id="{{ $group->permissions[$i]->name }}">
                                                            <label
                                                                for="{{ $group->permissions[$i]->name }}">{{ $group->permissions[$i]->display_name }}</label>&nbsp;
                                                            &nbsp;
                                                        @else
                                                            {{ '--' }}
                                                        @endif
                                                    </td>
                                                </div>
                                            @endfor
                                            <td>
                                                @for ($i = 5; $i < count($group->permissions); $i++)
                                                    @if (isset($group->permissions[$i]->name) && $group->permissions[$i]->name != '')
                                                        <label class="checkbox-inline">
                                                            <input name="permission[]" type="checkbox"
                                                                value="{{ $group->permissions[$i]->name }}">
                                                            {{ $group->permissions[$i]->display_name }}
                                                        </label> <br />
                                                    @else
                                                        {{ '--' }}
                                                    @endif
                                                @endfor
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <button class="btn btn--base">Save</button>
        <button class="btn btn--base bg--danger">Cancel</button>

        {!! Form::close() !!}
    </div>
@endsection
