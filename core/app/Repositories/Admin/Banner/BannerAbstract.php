<?php

namespace App\Repositories\Admin\Banner;

use App\Models\Banner;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Helpers\Generals;

class BannerAbstract implements BannerInterface
{
    use RepoResponse;

    protected $banner;

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    public function getPaginatedList($request, $per_page = 20)
    {
        $data = $this->banner::get();
        // echo '<pre>';
        // echo '======================<br>';
        // print_r($data);
        // echo '<br>======================<br>';
        // exit();
        return $this->formatResponse(true, '', '', $data);
    }

    public function getList()
    {
        return DB::table('banners')->get();
    }

    public function postStore($request)
    {
        DB::beginTransaction();
        try {
            $banner = new Banner();
            $banner->title = $request->title;
            $banner->link = $request->link;
            $banner->alt = $request->alt;
            if ($request->has('banner_image')) {
                $banner->banner_image = Generals::upload('banner/', 'png', $request->file('banner_image'));
            }
            $banner->status = 1;
            $banner->save();
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to create !', 'admin.banner.index');
        }

        DB::commit();
        return $this->formatResponse(true, 'Banner has been Created successfully !', 'admin.banner.index');
    }

    public function postUpdate($request, int $id)
    {
        DB::beginTransaction();
        try {
            $banner = $this->banner->where('id', $id)->first();
            $banner->title = $request->title;
            $banner->link = $request->link;
            $banner->alt = $request->alt;
            if ($request->has('banner_image')) {
                $banner->banner_image = Generals::update('banner/', $banner->banner_image, 'png', $request->file('banner_image'));
            }
            $banner->status = 1;
            $banner->update();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to update!', 'admin.banner.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'Banner has been updated successfully !', 'admin.banner.index');
    }

    public function getShow(int $id)
    {
        $data =  Banner::find($id);
        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.banner.index', $data);
        }
        return $this->formatResponse(false, 'Did not found data !', 'admin.banner.index', null);
    }

    public function delete(int $id)
    {
        DB::begintransaction();
        try {
            DB::table('banners')->where('id', $id)->delete();
            DB::commit();
            echo 'deleted successfully';
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to delete this action !', 'admin.banner.index');
        }
        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.banner.index');
    }
}
