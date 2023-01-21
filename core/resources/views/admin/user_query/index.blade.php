@extends('admin.layout.master')
@section('title')
    @lang('Received Messages')
@endsection
@section('page-name')
    @lang('Received Messages')
@endsection

@php
    $roles = userRolePermissionArray();
@endphp
@section('content')
    @include('admin.user_query._breadcam')
    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table small">
                    <thead>
                        <tr>
                            <th scope="col">@lang('SL')</th>
                            <th scope="col">@lang('Date')</th>
                            <th scope="col">@lang('Name')</th>
                            <th scope="col">@lang('Email')</th>
                            <th scope="col">@lang('Subject')</th>
                            <th scope="col">@lang('Message')</th>
                            <th scope="col">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rows as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{{ $item->user_message }}</td>
                                <td>
                                    @if (hasAccessAbility('contact_reply', $roles))
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            class="text-success">Reply</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%">{{ $emptyMessage }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- card end -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reply Mail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--base bg--danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn--base">Send</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript"></script>
@endsection
