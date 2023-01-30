<?php
namespace App\Repositories\Admin\CategoryType;

use App\Models\CategoryType;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;


class CategoryTypeAbstract implements CategoryTypeInterface
{
    use RepoResponse;

    protected $category_type;

    public function __construct(CategoryType $category_type)
    {
        $this->category_type = $category_type;
    }

    public function getPaginatedList($request,$per_page = 20)
    {
        $data = $this->category_type::get();
        // echo '<pre>';
        // echo '======================<br>';
        // print_r($data);
        // echo '<br>======================<br>';
        // exit();
        return $this->formatResponse(true, '', '', $data);
    }
    public function postStore($request)
    {
        DB::beginTransaction();
        try {
            CategoryType::create($request->all());
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to create !', 'admin.category-type.index');
        }

        DB::commit();
        return $this->formatResponse(true, 'Type has been Created successfully !', 'admin.category-type.index');
    }

    public function postUpdate($request, int $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $category_type = CategoryType::findOrFail($id);
            $category_type->fill($data)->save();
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to update!', 'admin.category-type.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'Type has been updated successfully !', 'admin.category-type.index');
    }

    public function getShow(int $id)
    {
        $data =  CategoryType::find($id);
        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.category-type.index', $data);
        }
        return $this->formatResponse(false, 'Did not found data !', 'admin.category-type.index', null);
    }

    public function delete(int $id)
    {
        DB::begintransaction();
        try {
            DB::table('categories')->where('id', $id)->delete();
            DB::commit();
            echo 'deleted successfully';
        } catch (\Exception $e) {
           info($e);
            DB::rollback();
           return $this->formatResponse(false, 'Unable to delete this action !', 'admin.category-type.index');
        }
        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.category-type.index');
    }
}
