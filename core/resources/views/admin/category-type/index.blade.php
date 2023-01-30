@extends('admin.layout.master')
@section('title')
    @lang('Category Type')
@endsection
@section('category-name')
    @lang('Category Type')
@endsection
@php
    $roles = userRolePermissionArray();
@endphp
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">@lang('Dashboard')</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">@lang('Dashboard')</span>
            </a>
            @if (hasAccessAbility('create_category_type', $roles))
                <i class="las la-angle-right"></i>
                <a href="{{ route('admin.category.type.index') }}">
                    <span class="active-path g-color">@lang('Category Type')</span>
                </a>
            @endif
        </div>
        <div class="view-prodact">
            @if (hasAccessAbility('create_category_type', $roles))
                <a href="{{ route('admin.category.type.create') }}">
                    <i class="las la-plus"></i>
                    <span>@lang('Add Category Type')</span>
                </a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table small">
                    <thead>
                        <tr>
                            <th scope="col">@lang('SL')</th>
                            <th scope="col">@lang('Name')</th>
                            <th scope="col">@lang('Slug')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($rows))
                            @foreach ($rows as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>
                                        @if (hasAccessAbility('status_change_category_type', $roles))
                                            @if ($item['status'] == 1)
                                                <a class="item_status" id="item-{{ $item['id'] }}"
                                                    item_id="{{ $item['id'] }}" id="item_{{ $item['id'] }}"
                                                    href="javascript:void(0)">
                                                    <i class="las la-check-circle icon-size text-success"
                                                        status="Active"></i>
                                                </a>
                                            @else
                                                <a class="item_status" id="item-{{ $item['id'] }}"
                                                    item_id="{{ $item['id'] }}" id="item_{{ $item['id'] }}"
                                                    href="javascript:void(0)">
                                                    <i class="las la-times-circle icon-size text-danger"
                                                        status="In Active"></i>
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if (hasAccessAbility('edit_category_type', $roles))
                                            <a title="@lang('Edit')"
                                                href="{{ route('admin.category.type.edit', $item['id']) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endif
                                        @if (hasAccessAbility('delete_category_type', $roles))
                                            <a href="{{ route('admin.category.type.delete', $item['id']) }}"
                                                onclick="return confirm('Are you sure?')">
                                                <button type="button" class="btn btn-sm btn-danger"><i
                                                        class="la la-trash"></i>
                                                </button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="100%">@lang('No data found')</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- card end -->
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).on("click", ".item_status", function() {
            var status = $(this).children("i").attr("status");
            var item_id = $(this).attr("item_id");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '{{ route('admin.category.type.status') }}',
                data: {
                    status: status,
                    item_id: item_id
                },
                success: function(resp) {
                    if (resp['status'] == 0) {
                        $('#item-' + item_id).html(
                            '<i class="las la-times-circle icon-size text-danger" status="In Active"></i>'
                        );
                    } else if (resp['status'] == 1) {
                        $('#item-' + item_id).html(
                            '<i class="las la-check-circle icon-size text-success" status="Active"></i>'
                        );
                    }
                }
            });
        });
    </script>
@endsection
