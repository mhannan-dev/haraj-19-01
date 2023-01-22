@extends('admin.layout.master')
@section('title')
    @lang('Categories')
@endsection
@section('category-name')
    @lang('Categories')
@endsection
@php
    $roles = userRolePermissionArray();
@endphp
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table small">
                    <thead>
                        <tr>
                            <th scope="col">@lang('SL')</th>
                            <th scope="col">@lang('Parent')</th>
                            <th scope="col">@lang('Name')</th>
                            <th scope="col">@lang('Slug')</th>
                            <th scope="col">@lang('Icon')</th>
                            <th scope="col">@lang('Image')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($rows))
                            @foreach ($rows as $key => $item)
                                @if (!isset($item->parent_category->title))
                                    <?php $parent_category = 'ROOT'; ?>
                                @else
                                    <?php $parent_category = $item->parent_category->title; ?>
                                @endif
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        {{ $parent_category }}
                                    </td>
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{!! $item->icon !!}</i></td>
                                    <td><img src="{{ asset('core/storage/app/public/category/' . $item->image) }}"
                                            alt="Image" width="40"></td>
                                    <td>
                                        @if (hasAccessAbility('status_change_category', $roles))
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
                                        @if (hasAccessAbility('edit_category', $roles))
                                            <a title="@lang('Edit')"
                                                href="{{ route('admin.category.edit', $item['id']) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endif
                                        @if (hasAccessAbility('delete_category', $roles))
                                            <a href="{{ route('admin.category.delete', $item['id']) }}"
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
                                <td colspan="100%">No data found</td>
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
                url: '{{ route('admin.category.status') }}',
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
