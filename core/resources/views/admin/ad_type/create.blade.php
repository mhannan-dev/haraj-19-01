@extends('admin.layout.master')
@section('title')
    @lang('Ad Package')
@endsection
@section('page-name')
    @lang('Ad Package')
@endsection

@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">@lang('Dashboard')</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">@lang('Dashboard')</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="{{ route('admin.type.index') }}">
                <span class="active-path g-color">@lang('Ad Package List')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="{{ route('admin.type.create') }}">
                <i class="las la-plus"></i>
                <span>@lang('Ad Package')</span>
            </a>
        </div>
    </div>
    <form action="{{ route('admin.type.store') }}" method="post">
        @include('admin.ad_type._form', ['buttonText' => 'Save'])
    </form>
@endsection

@section('scripts')
<script>
    $(document).on('change', '#startDate', function() {
    startDate = $(this).val();
    if (startDate) {
    $("#endDate").prop('required', true);
    }
    });
</script>
<script>
    $('#startDate , #endDate').change(function() {
        let fr = $('#startDate').val();
        let to = $('#endDate').val();
        if (fr != '' && to != '') {
            if (fr > to) {
                $('#startDate').val('');
                $('#endDate').val('');
                toastr.error('Invalid date range!', Error, {
                    CloseButton: true,
                    ProgressBar: true
                });
            }
        }
    })
</script>
@endsection

