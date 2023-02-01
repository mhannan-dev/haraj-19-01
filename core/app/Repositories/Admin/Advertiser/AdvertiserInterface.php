<?php
namespace App\Repositories\Admin\Advertiser;


interface AdvertiserInterface
{
    public function getShow(int $id);
    public function postUpdate($request, int $id);
}
