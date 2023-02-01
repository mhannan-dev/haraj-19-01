<?php
namespace App\Repositories\Admin\CategoryItem;
use App\Models\CategoryItem;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;

class CategoryItemAbstract implements CategoryItemInterface
{
    use RepoResponse;

    protected $category_item;

    public function __construct(CategoryItem $category_item)
    {
        $this->category_item = $category_item;
    }

    public function getPaginatedList($request,$per_page = 20)
    {
        $data = CategoryItem::with('category')->paginate($per_page);
        return $this->formatResponse(true, '', '', $data);
    }

    public function getList() {
        return DB::table('category_items')->get();
    }

    public function postStore($request)
    {
        DB::beginTransaction();

        try {
            $cItem = new CategoryItem();
            $cItem->title = $request->title;
            $cItem->category_id = $request->category_id;
            $cItem->status = 1;
            $cItem->save();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to create !', 'admin.category-item.index');
        }

        DB::commit();
        return $this->formatResponse(true, 'Category Item Created successfully !', 'admin.category-item.index');
    }

    public function postUpdate($request, int $id)
    {
        DB::beginTransaction();
        try {
            $cItem = $this->category_item->where('id', $id)->first();
            $cItem->title = $request->title;
            $cItem->category_id = $request->category_id;
            $cItem->status = 1;
            $cItem->update();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to update!', 'admin.category-item.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'Category has been updated successfully !', 'admin.category-item.index');
    }

    public function getShow(int $id)
    {
        $data =  CategoryItem::find($id);
        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.category-item.index', $data);
        }
        return $this->formatResponse(false, 'Did not found data !', 'admin.category-item.index', null);
    }

    public function delete(int $id)
    {
        DB::begintransaction();
        try {
            DB::table('category_items')->where('id', $id)->delete();
            DB::commit();
            echo 'deleted successfully';
        } catch (\Exception $e) {
           // dd($e);
            DB::rollback();
           return $this->formatResponse(false, 'Unable to delete this action !', 'admin.category-item.index');
        }
        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.category-item.index');
    }
}
