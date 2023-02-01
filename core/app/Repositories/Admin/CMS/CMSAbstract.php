<?php
namespace App\Repositories\Admin\CMS;

use App\Models\CMSPage;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;

class CMSAbstract implements CMSInterface
{
    use RepoResponse;

    protected $cms_page;

    public function __construct(CMSPage $cms_page)
    {
        $this->cms_page = $cms_page;
    }

    public function getPaginatedList($request,$per_page = 20)
    {
        $data = $this->cms_page::get();
        // echo '<pre>';
        // echo '======================<br>';
        // print_r($data);
        // echo '<br>======================<br>';
        // exit();
        return $this->formatResponse(true, '', '', $data);
    }

    public function getList() {
        return DB::table('cms_pages')->get();
    }

    public function postStore($request)
    {
        DB::beginTransaction();

        try {
            $cms_page = new CMSPage();
            $cms_page->title = $request->title;
            $cms_page->meta_title = $request->meta_title;
            // $cms_page->meta_tags = $request->meta_tags;
            $cms_page->description = $request->description;
            $cms_page->meta_description = $request->meta_description;
            $cms_page->position = $request->position;
            $cms_page->status = 1;
            $cms_page->save();
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to create page !', 'admin.cms.index');
        }

        DB::commit();
        return $this->formatResponse(true, 'Page has been created successfully !', 'admin.cms.index');
    }

    public function postUpdate($request, int $id)
    {
        DB::beginTransaction();
        try {
            $cms_page = $this->cms_page->where('id', $id)->first();
            $cms_page->title = $request->title;
            $cms_page->meta_title = $request->meta_title;
            // $cms_page->meta_tags = $request->meta_tags;
            $cms_page->description = $request->description;
            $cms_page->position = $request->position;
            $cms_page->meta_description = $request->meta_description;
            $cms_page->status = 1;
            $cms_page->update();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to update page!', 'admin.cms.index');
        }

        DB::commit();

        return $this->formatResponse(true, 'Page has been updated successfully !', 'admin.cms.index');
    }

    public function getShow(int $id)
    {
        $data =  CMSPage::find($id);
        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.cms.index', $data);
        }
        return $this->formatResponse(false, 'Did not found data !', 'admin.cms.index', null);
    }

    public function delete(int $id)
    {
        DB::begintransaction();
        try {
            DB::table('cms_pages')->where('id', $id)->delete();
            DB::commit();
            echo 'deleted successfully';
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
           return $this->formatResponse(false, 'Unable to delete this action !', 'admin.cms.index');
        }
        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.cms.index');
    }

    public function status($request, int $id)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            CMSPage::where('id', $data['item_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'item_id' => $data['item_id']]);
        }
    }

}
