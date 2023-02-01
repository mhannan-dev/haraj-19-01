<?php

namespace App\Repositories\Admin\Contact;

interface ContactInterface
{
    public function getPaginatedList($request,$per_page);
    public function getList();
}
