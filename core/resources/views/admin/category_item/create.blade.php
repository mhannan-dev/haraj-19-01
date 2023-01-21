@extends('admin.layout.master')
@section('title')
    @lang('Create Category Item')
@endsection
@section('page-name')
    @lang('Create Category Item')
@endsection

@section('content')
    @include('admin.category_item._breadcam')
    <form action="{{ route('admin.category-item.store') }}" method="post">
        @include('admin.category_item._form', ['buttonText' => 'Save'])
    </form>
@endsection

@section('scripts')
    <script type="text/javascript"></script>
@endsection
