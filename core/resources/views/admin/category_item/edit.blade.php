@extends('admin.layout.master')
@section('title')
    @lang('Update Item')
@endsection
@section('page-name')
    @lang('Update Item')
@endsection

@section('content')
    @include('admin.category_item._breadcam')
    <form action="{{ route('admin.category-item.update', $row['id']) }}" method="post">
        @include('admin.category_item._form', ['buttonText' => 'Update'])
    </form>
@endsection
@section('scripts')
    <script type="text/javascript"></script>
@endsection
