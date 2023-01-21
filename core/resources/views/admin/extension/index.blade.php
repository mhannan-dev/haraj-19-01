@extends('admin.layout.master')
@section('title')
    Extensions
@endsection
@section('page-name')
    Extensions
@endsection
@php

@endphp
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table small">
                    <thead>
                        <tr>
                            <th>@lang('Extension')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($extensions as $item)
                            <tr>
                                <td data-label="@lang('Extension')">
                                    <span class="name">{{ __($item->name) }}</span>
                                </td>
                                <td data-label="@lang('Status')">
                                    @if ($item->status == 1)
                                        <a title="Change" item_id="{{ $item->id }}"
                                            class="text--small text--base item_status"
                                            id="item_{{ $item->id }}" href="javascript:void(0)">@lang('Active')
                                        </a>
                                    @else
                                        <a title="Change" item_id="{{ $item->id }}"
                                            class="text--small text-warning item_status"
                                            id="item_{{ $item->id }}" href="javascript:void(0)">@lang('Inactice')
                                        </a>
                                    @endif
                                </td>
                                <td data-label="@lang('Action')">
                                    <button type="button" class="icon-btn ml-1 editBtn" data-name="{{ __($item->name) }}"
                                        data-shortcode="{{ json_encode($item->shortcode) }}"
                                        data-action="{{ route('admin.setting.extensions.update', $item->id) }}"
                                        data-toggle="tooltip" title="@lang('Configure')">
                                        <i class="la la-cogs"></i>
                                    </button>
                                    <button type="button" class="icon-btn btn-primary ml-1 helpBtn"
                                        data-description="{{ __($item->description) }}"
                                        data-support="{{ __($item->support) }}" data-toggle="tooltip"
                                        title="@lang('Help')">
                                        <i class="la la-question"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- EDIT METHOD MODAL --}}
    <div id="editModal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Update Extension'): <span class="extension-name"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-12 control-label font-weight-bold">@lang('Script') <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <textarea name="script" class="form-control" rows="8" placeholder="@lang('Paste your script with proper key')"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary" id="editBtn">@lang('Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- HELP METHOD MODAL --}}
    <div id="helpModal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Need Help')?</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        $(document).on("click", ".item_status", function() {
            var status = $(this).text();
            var item_id = $(this).attr("item_id");
            $.ajax({
                type: 'post',
                url: '{{ route('admin.setting.extensions.status') }}',
                data: {
                    status: status,
                    item_id: item_id
                },
                success: function(resp) {
                    if (resp['status'] == 0) {
                        $("#item_" + item_id).html(
                            "<a href='javascript:void(0)' class='text-warning item_status'>Inactive</a>"
                        )
                    } else if (resp['status'] == 1) {
                        $("#item_" + item_id).html(
                            "<a href='javascript:void(0)' class='text--base item_status'>Active</a>"
                        )
                    }
                    setTimeout(function() {
                        $(".item_status").reload(location.href + " .item_status");
                    }, 1500);
                }
            });
        });
    </script>

    <script>
        (function($) {
            "use strict";
            $('.activateBtn').on('click', function() {
                var modal = $('#activateModal');
                modal.find('.extension-name').text($(this).data('name'));
                modal.find('input[name=id]').val($(this).data('id'));
            });

            $('.deactivateBtn').on('click', function() {
                var modal = $('#deactivateModal');
                modal.find('.extension-name').text($(this).data('name'));
                modal.find('input[name=id]').val($(this).data('id'));
            });

            $('.editBtn').on('click', function() {
                var modal = $('#editModal');
                var shortcode = $(this).data('shortcode');

                modal.find('.extension-name').text($(this).data('name'));
                modal.find('form').attr('action', $(this).data('action'));

                var html = '';
                $.each(shortcode, function(key, item) {
                    html += `<div class="form-group">
                    <label class="col-md-12 control-label font-weight-bold">${item.title}<span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input name="${key}" class="form-control" placeholder="--" value="${item.value}" required>
                    </div>
                </div>`;
                })
                modal.find('.modal-body').html(html);

                modal.modal('show');
            });

            $('.helpBtn').on('click', function() {
                var modal = $('#helpModal');
                var path = "{{ asset(imagePath()['extensions']['path']) }}";
                modal.find('.modal-body').html(`<div class="mb-2">${$(this).data('description')}</div>`);
                if ($(this).data('support') != 'na') {
                    modal.find('.modal-body').append(`<img src="${path}/${$(this).data('support')}">`);
                }
                modal.modal('show');
            });

        })(jQuery);
    </script>
@endsection
