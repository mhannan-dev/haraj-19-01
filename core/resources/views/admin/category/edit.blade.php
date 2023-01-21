@extends('admin.layout.master')
@section('title')
    @lang('Update category')
@endsection
@section('page-name')
    @lang('Update category')
@endsection

@section('content')
@include('admin.category._breadcrumb')
    <form action="{{ route('admin.category.update', $row['id']) }}" method="post" enctype="multipart/form-data">
        @include('admin.category._form', ['buttonText' => 'Update'])
    </form>
@endsection
@section('scripts')
<script type="text/javascript">

</script>
@endsection
