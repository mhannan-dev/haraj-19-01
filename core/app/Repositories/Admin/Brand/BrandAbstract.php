<?php
namespace App\Repositories\Admin\Brand;
use App\Models\Brand;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;

class BrandAbstract implements BrandInterface
{
    use RepoResponse;

    protected $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function getPaginatedList($request,$per_page = 20)
    {
        $data = $this->brand::with('category')->paginate($per_page);
        return $this->formatResponse(true, '', '', $data);
    }

    // public function getList() {
    //     return DB::table('categories')->get();
    // }

    public function postStore($request)
    {
        DB::beginTransaction();
        try {
            $brand = new Brand();
            $brand->title = $request->title;
            $brand->category_id = $request->category_id;
            $brand->status = 1;
            $brand->save();
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to create !', 'admin.brand.index');
        }

        DB::commit();
        return $this->formatResponse(true, 'Brand has been Created successfully !', 'admin.brand.index');
    }

    public function postUpdate($request, int $id)
    {
        DB::beginTransaction();
        try {
            $brand = $this->brand->where('id', $id)->first();
            $brand->title = $request->title;
            $brand->category_id = $request->category_id;
            $brand->status = 1;
            $brand->update();
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to update!', 'admin.brand.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'Brand has been updated successfully !', 'admin.brand.index');
    }

    public function getShow(int $id)
    {
        $data =  Brand::find($id);
        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.brand.index', $data);
        }
        return $this->formatResponse(false, 'Did not found data !', 'admin.brand.index', null);
    }

    public function delete(int $id)
    {
        DB::begintransaction();
        try {
            DB::table('brands')->where('id', $id)->delete();
            DB::commit();
            echo 'deleted successfully';
        } catch (\Exception $e) {
           info($e);
            DB::rollback();
           return $this->formatResponse(false, 'Unable to delete this action !', 'admin.brand.index');
        }
        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.brand.index');
    }
}
