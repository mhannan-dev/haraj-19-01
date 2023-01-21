@extends('admin.layout.master')
@section('title')
    @lang('Pages')
@endsection
@section('page-name')
    @lang('Pages')
@endsection
@php
 ;
@endphp
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">Dashboard</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">Dashboards</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="{{ route('admin.cms.index') }}">
                <span class="active-path g-color">@lang('Pages')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="{{ route('admin.cms.create') }}">
                <i class="las la-plus"></i>
                <span>@lang('Add Page')</span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table small">
                    <thead>
                        <tr>
                            <th scope="col">@lang('Page Name')</th>
                            <th scope="col">@lang('Slug')</th>
                            <th scope="col">@lang('Description')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rows as $page)
                            <tr>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->slug }}</td>
                                <td>{{ $page->description }}</td>
                                <td>
                                    @if ($page['status'] == 1)
                                        <a title="Change" page_id="{{ $page['id'] }}" class="text-success page_status"
                                            id="page_{{ $page['id'] }}" href="javascript:void(0)">
                                            Active
                                        </a>
                                    @else
                                        <a title="Change" class="page_status text-warning" id="page_{{ $page['id'] }}"
                                            page_id="{{ $page['id'] }}" href="javascript:void(0)">In
                                            Active
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a title="@lang('Edit')" href="{{ route('admin.cms.edit', $page['id']) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.cms.delete', $page['id']) }}" onclick="return confirm('Are you sure?')">
                                        <button type="button" class="btn btn-sm btn-danger"><i
                                                class="la la-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ $emptyMessage ? $emptyMessage : 'No data found'   }}</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table><!-- table end -->
            </div>
        </div>
    </div><!-- card end -->
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).on("click", ".page_status", function() {
            var status = $(this).text();
            var page_id = $(this).attr("page_id");
            $.ajax({
                type: 'post',
                url: '{{ route('admin.cms.status') }}',
                data: {
                    status: status,
                    page_id: page_id
                },
                success: function(resp) {
                    if (resp['status'] == 0) {
                        $("#page_" + page_id).html(
                            "<a href='javascript:void(0)' class='page_status'>Inactive</a>"
                        )
                    } else if (resp['status'] == 1) {
                        $("#page_" + page_id).html(
                            "<a href='javascript:void(0)' class='page_status'>Active</a>"
                        )
                    }
                    setTimeout(function() {
                        $(".page_status").reload(location.href + " .page_status");
                    }, 1500);
                }
            });
        });
    </script>

@endsection
