@component('mail::message')
    # Password change

    Below, is an OTP to change your password
    # {{ $otp }}
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
