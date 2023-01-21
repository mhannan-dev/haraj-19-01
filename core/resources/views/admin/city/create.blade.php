@extends('admin.layout.master')
@section('title')
    @lang('Create City')
@endsection
@section('page-name')
    @lang('Create City')
@endsection

@section('content')
    @include('admin.city._breadcam')
    <form action="{{ route('admin.city.store') }}" method="post">
        @include('admin.city._form', ['buttonText' => 'Save'])
    </form>
@endsection

@section('scripts')
    <script type="text/javascript"></script>
@endsection
