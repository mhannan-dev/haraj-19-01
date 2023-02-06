@extends('admin.layout.master')
@section('title')
    Currency
@endsection
@section('page-name')
    Currency
@endsection
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">Dashboard</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">Dashboard</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="{{ route('admin.currency.index') }}">
                <span class="active-path g-color">Currency</span>
            </a>
        </div>
        <div class="view-prodact">
            {{-- <a href="" data-bs-toggle="modal" data-bs-target="#currencyApi">
                <i class="las la-key"></i>
                <span>@lang('Currency Api Key')</span>
            </a> --}}
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.currency.manage', $currency['id']) }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Currency Name')</label>
                            <input class="form-control form--control" type="text" name="currency_fullname"
                                placeholder="@lang('e.g: United States Dollar')" required
                                value="{{ @old('currency_fullname', $currency['currency_fullname']) }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('Currency Code')</label>
                            <input class="form-control form--control" type="text" name="currency_code"
                                placeholder="@lang('e.g: USD')" required
                                value="{{ @old('currency_code', $currency['currency_code']) }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('Currency Symbol')</label>
                            <input class="form-control form--control" type="text" name="currency_symbol"
                                placeholder="@lang('e.g: $')" required
                                value="{{ @old('currency_symbol', $currency['currency_symbol']) }}">
                        </div>
                        {{-- <div class="form-group">
                            <label>@lang('Currency Rate')</label>
                            <div class="input-group has_append">
                                <div class="input-group-prepend">
                                    <div class="input-group-text cur_code"></div>
                                </div>
                                <input type="text" class="form-control form--control" placeholder="0" name="rate"
                                    value="{{ @old('rate', $currency['rate']) }}" />
                                <div class="input-group-append">
                                    <div class="input-group-text">{{ $general->cur_text }}</div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>@lang('Currency Type')</label>
                            <select class="form-control form--control" name="currency_type" required>
                                <option value="">--@lang('Select Type')--</option>
                                <option value="1" {{ $currency['currency_type'] == 1 ? 'selected' : '' }}>
                                    @lang('FIAT')</option>
                                <option value="2" {{ $currency['currency_type'] == 2 ? 'selected' : '' }}>
                                    @lang('CRYPTO')</option>
                            </select>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>@lang('Default Currency') </label>
                            <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                data-offstyle="-danger" data-toggle="toggle" data-on="@lang('SET')"
                                data-off="@lang('UNSET')" name="is_default"
                                @if ($currency['is_default']) checked @endif>
                        </div>
                        <div class="form-group">
                            <label>@lang('Status') </label>
                            <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success"
                                data-offstyle="-danger" data-toggle="toggle" data-on="@lang('Active')"
                                data-off="@lang('Inactive')" name="status"
                                checked>

                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('admin.currency.index') }}" class="btn btn--base bg--danger">@lang('Back')</a>
                        <button type="submit" class="btn btn--base">{{ $buttonText }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Currency Api Modal -->
    <div class="modal fade" id="currencyApi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('admin.currency.api.update') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header bg--primary">
                        <h5 class="modal-title text-white">@lang('Currency Api Key')</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="font-weight-bold text--info">@lang('Fiat Currency Rate Api Key')</label>
                            ( <small>@lang('For the api key please visit :')
                                <a target="_blank" class="text--info"
                                    href="https://currencylayer.com/">@lang('Currency Layer')</a>
                            </small> )
                            <input class="form-control form--control" type="text" name="fiat_api_key"
                                placeholder="@lang('Fiat Currency Rate Api Key')" required value="{{ $general->fiat_currency_api }}">
                        </div>


                        <div class="form-group mb-3">
                            <small class="font-weight-bold">@lang('Set up cron job for update fiat price rate :')</small>
                            <small class="text--danger">{{ route('frontend.cron.fiat.rate') }}</small>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label class="font-weight-bold text--warning">@lang('Crypto Currency Rate Api Key')</label>
                            ( <small>@lang('For the api key please visit :')
                                <a target="_blank" class="text--info"
                                    href="https://coinmarketcap.com/">@lang('CoinMarketCap')</a>
                            </small> )
                            <input class="form-control form--control" type="text" name="crypto_api_key"
                                placeholder="@lang('Crypto Currency Rate Api Key')" required value="{{ $general->crypto_currency_api }}">
                        </div>

                        <div class="form-group">
                            <small class="font-weight-bold">@lang('Set up cron job for update crypto price rate :')</small>
                            <small class="text--danger">{{ route('frontend.cron.crypto.rate') }}</small>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary">@lang('Update')</button>
                        <button type="button" class="btn btn--dark" data-bs-dismiss="modal">@lang('Close')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('input[name=currency_code]').on('input', function() {
            var code = $(this).val().toUpperCase()
            $('.cur_code').text(1 + ' ' + code + ' =')
        })
    </script>
@endsection
