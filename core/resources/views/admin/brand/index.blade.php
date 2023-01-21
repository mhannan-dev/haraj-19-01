@extends('admin.layout.master')
@section('title')
    Brand List
@endsection
@section('page-name')
    Brand List
@endsection
@section('content')
    @include('admin.brand._breadcam')
    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table small">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Category</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($rows))
                            {{-- @dd($rows) --}}
                            @foreach ($rows as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->category ? $item->category->title : '' }}</td>
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
                                    <td><a title="@lang('Edit')" href="{{ route('admin.brand.edit', $item['id']) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a onclick="return confirm('Are you sure?')" href="{{ route('admin.brand.delete', $item['id']) }}">
                                            <button type="button" class="btn btn-sm btn-danger"><i class="la la-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-muted text-center" colspan="100%">No Data Found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- card end -->
    {{ $rows->links() }}
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
                url: '{{ url('brand/update-status') }}',
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
