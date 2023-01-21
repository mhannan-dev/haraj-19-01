@extends('admin.layout.master')
@section('title')
    @lang('Received Messages')
@endsection
@section('page-name')
    @lang('Received Messages')
@endsection

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
@endsection

@section('scripts')
    <script type="text/javascript">

    </script>
@endsection
