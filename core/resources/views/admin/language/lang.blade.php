@extends('admin.layout.master')
@section('title')
    Language
@endsection
@section('page-name')
    Language
@endsection
@push('custom_css')
    <style>
        .form-select {
            width: 30%;
            background-color: rgb(15, 12, 12);
            color: white;
        }
    </style>
@endpush
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">Dashboard</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">Dashboard</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="#">
                <span class="active-path g-color">Language</span>
            </a>
        </div>
        {{-- <select class="footer-language-select langSel form--control">
            @foreach ($languages as $item)
                <option value="{{ $item->code }}" @if (session('lang') == $item->code) selected @endif>
                    {{ __($item->name) }}</option>
            @endforeach
        </select> --}}

        {{-- <select class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select> --}}

        <div class="view-prodact">
            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="las la-plus"></i>
                New Language
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table small">
                    <thead>
                        <tr>
                            <th>@lang('Name')</th>
                            <th>@lang('Code')</th>
                            <th>@lang('Default')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($languages as $item)
                            <tr>
                                <td data-label="@lang('Name')">{{ __($item->name) }}
                                </td>
                                <td data-label="@lang('Code')"><strong>{{ __($item->code) }}</strong></td>
                                <td data-label="@lang('Default')">
                                    @if ($item->is_default == 1)
                                        <span
                                            class="text--small badge font-weight-normal badge--success">@lang('Default')</span>
                                    @else
                                        <span
                                            class="text--small badge font-weight-normal badge--warning">@lang('Selectable')</span>
                                    @endif
                                </td>
                                <td data-label="@lang('Action')">
                                    <a href="{{ route('admin.language.key', $item->id) }}" class="icon-btn btn--success"
                                        data-toggle="tooltip" title="@lang('Translate')">
                                        <i class="la la-code"></i>
                                    </a>

                                    <a href="{{ route('admin.language.edit', $item->id) }}" class="btn--primary"
                                        title="@lang('Edit')">
                                        <i class="la la-edit"></i>
                                    </a>
                                    @if ($item->id != 1)
                                        <a onclick="return confirm('Are you sure?')" href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteBtn"
                                            title="@lang('Delete')" data-toggle="tooltip"
                                            data-url="{{ route('admin.language.delete', $item->id) }}">
                                            <i class="la la-trash"></i>
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
                </table>
            </div>
        </div>
    </div>
    <!-- add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" action="{{ route('admin.language.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> @lang('Add New Language')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('Language Name') <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control form--control" id="code" name="name"
                                    placeholder="@lang('e.g. Japaneese')" required>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <label class="font-weight-bold">@lang('Language Code') <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control form--control" id="link" name="code"
                                    placeholder="@lang('e.g. jp')" required>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <div class="col-md-12">
                                <label for="inputName" class="">@lang('Default Language') <span
                                        class="text-danger">*</span></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                    data-offstyle="-danger" data-toggle="toggle" data-on="@lang('SET')"
                                    data-off="@lang('UNSET')" name="is_default">
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- DELETE MODAL -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deleteModalLabel">@lang('Remove Language')</h4>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <form method="post" action="">
                    @csrf
                    <input type="hidden" name="delete_id" id="delete_id" class="delete_id" value="0">
                    <div class="modal-body">
                        <p class="text-muted">@lang('Are you sure to delete?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--primary"
                            data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--danger deleteButton">@lang('Delete')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $('#example').dataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false,
            "oLanguage": {
                "sSearch": ""
            },
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search language"
            }
            // $('#example_filter input').addClass('form--control'); // <-- add this line


        });
    </script>
    <script>
        (function($) {
            "use strict";
            $('.editBtn').on('click', function() {
                var modal = $('#editModal');
                var url = $(this).data('url');
                var lang = $(this).data('lang');

                modal.find('form').attr('action', url);
                modal.find('input[name=name]').val(lang.name);
                modal.find('select[name=text_align]').val(lang.text_align);
                if (lang.is_default == 1) {
                    modal.find('input[name=is_default]').bootstrapToggle('on');
                } else {
                    modal.find('input[name=is_default]').bootstrapToggle('off');
                }
                modal.modal('show');
            });

            $('.deleteBtn').on('click', function() {
                var modal = $('#deleteModal');
                var url = $(this).data('url');

                modal.find('form').attr('action', url);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endsection
