@extends($activeTemplate.'layouts.frontend')
@section('content')

<section class="banner-section bg_img" data-background="{{asset($activeTemplateTrue.'kitocard/images/homepage.svg')}}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="banner-content">
                    <h1 class="title">Issue Unlimited Virtual Mastercards On Your Own Name !!</h1>
                    <span class="sub-title">ᴄʀᴇᴀᴛᴇ ᴠɪʀᴛᴜᴀʟ ᴅᴏʟʟᴀʀ ᴄᴀʀᴅꜱ ᴛʜᴀᴛ ᴀʟʟᴏᴡ ʏᴏᴜ ᴛᴏ ᴇᴀꜱɪʟʏ ᴘᴀʏ ᴏɴ ɴᴇᴛꜰʟɪx, ᴀᴘᴘʟᴇ ᴍᴜꜱɪᴄ, ꜱᴘᴏᴛɪꜰʏ, ᴀᴍᴀᴢᴏɴ, ᴘᴀʏᴘᴀʟ, ᴀʟɪʙᴀʙᴀ, ꜰᴀᴄᴇʙᴏᴏᴋ & ᴛɪᴋᴛᴏᴋ ᴀɴᴅ ᴍᴀɴʏ ᴍᴏʀᴇ.</span>
                    <div class="banner-btn-area d-flex justify-content-center">
                        <div class="banner-btn d-flex pb-5">
                            <a href="{{ route('user.login') }}" class="btn--base me-4"><i class="las la-sign-in-alt pe-2"></i> Login</a>
                            <a href="{{ route('') }}" class="btn--base"><i class="las la-user-circle pe-2"></i> Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


@endsection
