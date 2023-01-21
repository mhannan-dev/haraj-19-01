<?php

namespace App\Repositories\Admin\Category;


interface CategoryInterface
{
    public function getPaginatedList($request,$per_page);
    // public function getList();
    public function postStore($request);
    public function postUpdate($request, int $id);
    public function getShow(int $id);
    public function delete(int $id);

}
