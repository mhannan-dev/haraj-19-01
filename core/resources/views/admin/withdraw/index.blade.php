@extends('admin.layout.master')
@section('title')
    @lang('Withdrawal Methods')
@endsection
@section('page-name')
    @lang('Withdrawal Methods')
@endsection
@php
 ;
@endphp
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">@lang('Dashboard')</h5>
        <div href="" class="dashboard-path">
            <a href="">
                <span class="main-path">@lang('Withdrawal Methods')</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="{{ route('admin.tickets.index') }}">
                <span class="active-path g-color">@lang('Withdrawal Methods')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="{{ route('admin.withdraw.method.create') }}">
                <i class="las la-plus"></i>
                <span>@lang('Withdrawal Method')</span>
            </a>
        </div>
    </div>

    <div class="table-area">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-wrapper table-responsive">
                    <table class="custom-table small">
                        <thead>
                            <tr>
                                <th>@lang('Method')</th>
                                <th>@lang('Currency')</th>
                                <th>@lang('Charge')</th>
                                <th>@lang('Withdraw Limit')</th>
                                <th>@lang('Processing Time') </th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($methods as $method)
                                <tr>
                                    <td data-label="@lang('Method')">
                                        <div class="author-info">
                                            <div class="thumb"><img
                                                    src="{{ getImage(imagePath()['withdraw']['method']['path'] . '/' . $method->image, imagePath()['withdraw']['method']['size']) }}"
                                                    alt="@lang('image')"></div>

                                            <span class="name">{{ __($method->name) }}</span>
                                        </div>
                                    </td>

                                    <td data-label="@lang('Currency')" class="font-weight-bold">{{ __($method->currency) }}
                                    </td>
                                    <td data-label="@lang('Charge')" class="font-weight-bold">
                                        {{ showAmount($method->fixed_charge, $general->currency) }}
                                        {{ __($general->cur_text) }}
                                        {{ 0 < $method->percent_charge ? ' + ' . showAmount($method->percent_charge) . ' %' : '' }}
                                    </td>
                                    <td data-label="@lang('Withdraw Limit')" class="font-weight-bold">
                                        {{ $method->min_limit + 0 }}
                                        - {{ $method->max_limit + 0 }} {{ __($general->cur_text) }}</td>
                                    <td data-label="@lang('Processing Time')">{{ $method->delay }}</td>
                                    <td data-label="@lang('Status')">
                                        @if ($method->status == 1)
                                            <span
                                                class="text--small badge font-weight-normal badge--success">@lang('Active')</span>
                                        @else
                                            <span
                                                class="text--small badge font-weight-normal badge--warning">@lang('Disabled')</span>
                                        @endif
                                    </td>
                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('admin.withdraw.method.edit', $method->id) }}"
                                            class="icon-btn ml-1 btn btn-primary btn-sm" data-toggle="tooltip"
                                            data-original-title="@lang('Edit')"><i class="las la-pen"></i></a>
                                        @if ($method->status == 1)
                                            <a href="javascript:void(0)" class="icon-btn btn--danger deactivateBtn  ml-1"
                                                data-toggle="tooltip" data-original-title="@lang('Disable')"
                                                data-id="{{ $method->id }}" data-name="{{ __($method->name) }}">
                                                <i class="la la-eye-slash"></i>
                                            </a>
                                        @else
                                            <a href="javascript:void(0)" class="icon-btn btn--success activateBtn  ml-1"
                                                data-bs-toggle="tooltip" data-bs-target="#activateModal" title="@lang('Enable')"
                                                data-id="{{ $method->id }}" data-name="{{ __($method->name) }}">
                                                <i class="la la-eye"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
        </div><!-- card end -->
    </div>



    {{-- ACTIVATE METHOD MODAL --}}
    <div id="activateModal" class="modal fade" tabindex="-1" aria-labelledby="activateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Withdrawal Method Activation Confirmation')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.withdraw.method.activate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to activate') <span class="font-weight-bold method-name"></span> @lang('method')?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--info" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Activate')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- DEACTIVATE METHOD MODAL --}}
    <div id="deactivateModal" class="modal fade" tabindex="-1" aria-labelledby="activateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Withdrawal Method Disable Confirmation')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.withdraw.method.deactivate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to disable') <span class="font-weight-bold method-name"></span> @lang('method')?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--danger">@lang('Disable')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (function($) {
            "use strict";
            $('.activateBtn').on('click', function() {
                var modal = $('#activateModal');
                modal.find('.method-name').text($(this).data('name'));
                modal.find('input[name=id]').val($(this).data('id'));
                modal.modal('show');
            });

            $('.deactivateBtn').on('click', function() {
                var modal = $('#deactivateModal');
                modal.find('.method-name').text($(this).data('name'));
                modal.find('input[name=id]').val($(this).data('id'))
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endsection
