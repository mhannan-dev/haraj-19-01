<?php
namespace App\Http\Controllers;
class BaseController extends Controller
{
    protected $resp;

    public function __construct()
    {
        $this->resp = [];
    }
}
