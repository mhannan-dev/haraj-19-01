<?php
namespace App\Repositories\Admin\User;


interface UserInterface
{
    public function getPaginatedList($request, int $per_page = 10);
}
