<?php
namespace App\Repositories\Admin\Advertiser;
use App\Models\Advertiser;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;

class AdvertiserAbstract implements AdvertiserInterface
{
    use RepoResponse;
    protected $advertiser;

    public function __construct(Advertiser $advertiser)
    {
        $this->advertiser = $advertiser;
    }

    public function getShow(int $id)
    {
        $data =  Advertiser::find($id);
        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.advertiser.index', $data);
        }
        return $this->formatResponse(false, 'Did not found data !', 'admin.advertiser.index', null);
    }

    public function postUpdate($request, int $id)
    {
        DB::beginTransaction();
        try {
            $advertiser = $this->advertiser->where('id', $id)->first();
            $advertiser->first_name = $request->first_name;
            $advertiser->last_name = $request->last_name;
            $advertiser->mobile_no = $request->mobile_no;
            $advertiser->designation = $request->designation;
            $advertiser->update();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to update!', 'admin.advertiser.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'Advertiser has been updated successfully !', 'admin.advertiser.index');
    }
}
