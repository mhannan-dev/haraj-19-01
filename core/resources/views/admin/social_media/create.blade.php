@extends('admin.layout.master')
@section('title')
    @lang('Create Social Media')
@endsection
@section('page-name')
    @lang('Create Social Media')
@endsection

@section('content')
    @include('admin.social_media._breadcam')
    <form action="{{ route('admin.setting.social.media.store') }}" method="post">
        @include('admin.social_media._form', ['buttonText' => 'Save'])
    </form>
@endsection

@section('scripts')
    <script type="text/javascript"></script>
@endsection
