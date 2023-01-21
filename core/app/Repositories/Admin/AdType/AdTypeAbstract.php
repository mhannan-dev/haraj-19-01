<?php

namespace App\Repositories\Admin\AdType;
use App\Models\AdType;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;

class AdTypeAbstract implements AdTypeInterface
{
    use RepoResponse;
    protected $ad_type;
    public function __construct(AdType $ad_type)
    {
        $this->ad_type = $ad_type;
    }
    public function getPaginatedList($request, $per_page = 20)
    {
        $data = $this->ad_type::get();
        return $this->formatResponse(true, '', '', $data);
    }

    public function getList()
    {
        return DB::table('ad_types')->get();
    }

    public function postStore($request)
    {
        DB::beginTransaction();
        try {
            $ad_type = new AdType();
            $ad_type->title = $request->title;
            $ad_type->duration = $request->duration_hours;
            $ad_type->slug = $request->title;
            $ad_type->price = $request->price;
            $ad_type->status = 1;
            $ad_type->save();
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to create !', 'admin.type.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'Created successfully !', 'admin.type.index');
    }

    public function postUpdate($request, int $id)
    {
        DB::beginTransaction();
        try {
            $ad_type = $this->ad_type->where('id', $id)->first();
            $ad_type->title = $request->title;
            $ad_type->duration = $request->duration_hours;
            $ad_type->slug = $request->title;
            $ad_type->price = $request->price;
            $ad_type->status = 1;
            $ad_type->update();
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to update!', 'admin.type.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'Updated successfully !', 'admin.type.index');
    }

    public function getShow(int $id)
    {
        $data =  AdType::find($id);
        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.type.index', $data);
        }
        return $this->formatResponse(false, 'Did not found data !', 'admin.type.index', null);
    }

    public function delete(int $id)
    {
        DB::begintransaction();
        try {
            DB::table('ad_types')->where('id', $id)->delete();
            DB::commit();
            echo 'deleted successfully';
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to delete this action !', 'admin.type.index');
        }
        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.type.index');
    }
}
