<?php
namespace App\Repositories\Admin\SocialMedia;
use App\Models\SocialMedia;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;


class SocialMediaAbstract implements SocialMediaInterface
{
    use RepoResponse;

    protected $social_media;

    public function __construct(SocialMedia $social_media)
    {
        $this->social_media = $social_media;
    }

    public function getPaginatedList($request,$per_page = 20)
    {
        $data = $this->social_media::get();
        return $this->formatResponse(true, '', '', $data);
    }

    public function getList() {
        return DB::table('social_media')->get();
    }

    public function postStore($request)
    {
        DB::beginTransaction();

        try {
            $cItem = new SocialMedia();
            $cItem->title = $request->title;
            $cItem->icon = $request->icon;
            $cItem->social_link = $request->social_link;
            $cItem->status = 1;
            $cItem->save();
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to create !', 'admin.setting.social.media.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'Created successfully !', 'admin.setting.social.media.index');
    }

    public function postUpdate($request, int $id)
    {
        DB::beginTransaction();
        try {
            $cItem = $this->social_media->where('id', $id)->first();
            $cItem->title = $request->title;
            $cItem->icon = $request->icon;
            $cItem->social_link = $request->social_link;
            $cItem->status = 1;
            $cItem->update();
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to update!', 'admin.setting.social.media.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'Updated successfully !', 'admin.setting.social.media.index');
    }

    public function getShow(int $id)
    {
        $data =  SocialMedia::find($id);
        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.setting.social.media.index', $data);
        }
        return $this->formatResponse(false, 'Did not found data !', 'admin.setting.social.media.index', null);
    }

    public function delete(int $id)
    {
        DB::begintransaction();
        try {
            DB::table('social_media')->where('id', $id)->delete();
            DB::commit();
            echo 'deleted successfully';
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
           return $this->formatResponse(false, 'Unable to delete this action !', 'admin.setting.social.media.index');
        }
        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.setting.social.media.index');
    }
}
