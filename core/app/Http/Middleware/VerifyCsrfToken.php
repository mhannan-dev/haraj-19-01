<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/business/settings/cod/status',
        '/business/settings/digital/payment/status',
        '/payment/gateway/manual/status/change',
        '/payment/gateway/automatic/status/change',
        '/currency/status/change',
        '/setting/extensions/status/change',
        '/cms/update-status',
        '/category/update-status',
        '/type/status',
        '/city/status',
        '/user/check-current-pwd',
        '/user/make/sold',
        '/user/favourite',
    ];
}
