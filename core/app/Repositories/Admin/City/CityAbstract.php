<?php
namespace App\Repositories\Admin\City;
use App\Models\City;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;


class CityAbstract implements CityInterface
{
    use RepoResponse;

    protected $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function getPaginatedList($request,$per_page = 20)
    {
        $data = $this->city::get();
        return $this->formatResponse(true, '', '', $data);
    }

    public function getList() {
        return DB::table('cities')->get();
    }

    public function postStore($request)
    {
        DB::beginTransaction();

        try {
            $cItem = new City();
            $cItem->title = $request->title;
            $cItem->country_id = $request->country_id;
            $cItem->status = 1;
            $cItem->save();
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to create !', 'admin.city.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'City Created successfully !', 'admin.city.index');
    }

    public function postUpdate($request, int $id)
    {
        DB::beginTransaction();
        try {
            $cItem = $this->city->where('id', $id)->first();
            $cItem->title = $request->title;
            $cItem->country_id = $request->country_id;
            $cItem->status = 1;
            $cItem->update();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->formatResponse(false, 'Unable to update!', 'admin.city.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'City has been updated successfully !', 'admin.city.index');
    }

    public function getShow(int $id)
    {
        $data =  City::find($id);
        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.city.index', $data);
        }
        return $this->formatResponse(false, 'Did not found data !', 'admin.city.index', null);
    }

    public function delete(int $id)
    {
        DB::begintransaction();
        try {
            DB::table('cities')->where('id', $id)->delete();
            DB::commit();
            echo 'deleted successfully';
        } catch (\Exception $e) {
           // dd($e);
            DB::rollback();
           return $this->formatResponse(false, 'Unable to delete this action !', 'admin.city.index');
        }
        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.city.index');
    }
}
