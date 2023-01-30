<?php

namespace App\Repositories\Admin\CategoryType;


interface CategoryTypeInterface
{
    public function getPaginatedList($request,$per_page);
    public function postStore($request);
    public function postUpdate($request, int $id);
    public function getShow(int $id);
    public function delete(int $id);

}
