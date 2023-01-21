@extends('admin.layout.master')
@section('Dashboard', 'active')
@section('Dashboard', 'open')
@section('title')
    @lang('admin_action.list_page_title')
@endsection
@section('page-name')
    @lang('admin_action.list_page_sub_title')
@endsection

@section('content')
    {{-- <div class="dashboard-title-part">
        <h5 class="title">Dashboard</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">Dashboards</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="{{ route('admin.admin-user') }}">
                <span class="active-path g-color">Admin Users</span>
            </a>
        </div>
    </div> --}}
    <!-- body-wrapper-start -->
    <div class="user-detail-area">
        <div class="user-info-header two">
            <h5 class="title">Password change</h5>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('admin.layout.flash')
                <div class="dashboard-form-area two mt-10">
                    <form action="{{ url('pwd/change/change', auth()->user()->id) }}" method="post">
                        @csrf
                            <label>Current Password</label>
                            <input type="password" name="current_password" class="form--control" id="current_password"
                                placeholder="Enter Password...">
                            <span id="check_current_password"></span>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label>New Password</label>
                                <input type="password" name="new_password" class="form--control" id="new_password"
                                    placeholder="Enter Password...">

                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="again_new_password" class="form--control"
                                    id="again_new_password" placeholder="Confirm new password...">
                            </div>
                            <button type="button" class="btn btn--base bg--danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn--base">Update</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
