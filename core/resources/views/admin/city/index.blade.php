@extends('admin.layout.master')
@section('title')
    @lang('Cities')
@endsection
@section('page-name')
    @lang('Cities')
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
            <i class="las la-angle-right"></i>
            <a href="{{ route('admin.city.index') }}">
                <span class="active-path g-color">@lang('City List')</span>
            </a>
        </div>
        <div class="view-prodact">
            @if (hasAccessAbility('create_brand', $roles))
                <a href="{{ route('admin.city.create') }}">
                    <i class="las la-plus"></i>
                    <span>@lang('Add City')</span>
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
                            <th scope="col">@lang('Country')</th>
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
                                    <td>{{ 'Afghanistan' }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>
                                        @if ($item['status'] == 1)
                                            <a class="item_status" id="item-{{ $item['id'] }}"
                                                item_id="{{ $item['id'] }}" id="item_{{ $item['id'] }}"
                                                href="javascript:void(0)">
                                                <i class="las la-check-circle icon-size text-success" status="Active"></i>
                                            </a>
                                        @else
                                            <a class="item_status" id="item-{{ $item['id'] }}"
                                                item_id="{{ $item['id'] }}" id="item_{{ $item['id'] }}"
                                                href="javascript:void(0)">
                                                <i class="las la-times-circle icon-size text-danger" status="In Active"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td><a title="@lang('Edit')" href="{{ route('admin.city.edit', $item['id']) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.city.delete', $item['id']) }}"
                                            onclick="return confirm('Are you sure?')">
                                            <button type="button" class="btn btn-sm btn-danger"><i class="la la-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">{{ $emptyMessage }}</td>
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
                url: '{{ route('admin.city.status') }}',
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
