@extends('admin.layout.master')
@section('title')
    @lang('Withdrawal Methods')
@endsection
@section('page-name')
    @lang('Withdrawal Methods')
@endsection
@push('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <style>
        .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
            width: 29rem;
        }
    </style>
@endpush
@php
 ;
@endphp
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.withdraw.method.update', $method->id) }}" method="POST"
                enctype="multipart/form-data">
                @include('admin.withdraw._form', ['buttonText' => 'Update'])
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('select').selectpicker();
        });
    </script>
    <script>
        function proPicURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = $(input).parents('.thumb').find('.profilePicPreview');
                    $(preview).css('background-image', 'url(' + e.target.result + ')');
                    $(preview).addClass('has-image');
                    $(preview).hide();
                    $(preview).fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".profilePicUpload").on('change', function() {
            proPicURL(this);
        });

        $(".remove-image").on('click', function() {
            $(this).parents(".profilePicPreview").css('background-image', 'none');
            $(this).parents(".profilePicPreview").removeClass('has-image');
            $(this).parents(".thumb").find('input[type=file]').val('');
        });
    </script>

    <script>
        (function($) {
            "use strict";

            $('input[name=currency]').on('input', function() {
                $('.currency_symbol').text($(this).val());
            });
            $('.currency_symbol').text($('input[name=currency]').val());

            $('.addUserData').on('click', function() {
                var html = `
            <div class="col-md-12 user-data">
                <div class="form-group">
                    <div class="input-group mb-md-0 mb-4">
                        <div class="col-md-4">
                            <input name="field_name[]" class="form-control" type="text" required placeholder="@lang('Field Name')">
                        </div>
                        <div class="col-md-3 mt-md-0 mt-2">
                            <select name="type[]" class="form-control">
                                <option value="text" > @lang('Input Text') </option>
                                <option value="textarea" > @lang('Textarea') </option>
                                <option value="file"> @lang('File') </option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-md-0 mt-2">
                            <select name="validation[]"
                                    class="form-control">
                                <option value="required"> @lang('Required') </option>
                                <option value="nullable">  @lang('Optional') </option>
                            </select>
                        </div>
                        <div class="col-md-2 mt-md-0 mt-2 text-right">
                            <span class="input-group-btn">
                                <button class="btn btn--danger btn-lg removeBtn w-100" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>`;

                $('.addedField').append(html);
            });

            $(document).on('click', '.removeBtn', function() {
                $(this).closest('.user-data').remove();
            });

            @if (old('currency'))
                $('input[name=currency]').trigger('input');
            @endif
        })(jQuery);
    </script>
@endsection
