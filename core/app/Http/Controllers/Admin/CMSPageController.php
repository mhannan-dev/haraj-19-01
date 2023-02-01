<?php

namespace App\Http\Controllers\Admin;

use App\Models\CMSPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Admin\CMS\CMSInterface;
use App\Http\Requests\Admin\StoreCMSPageRequest;
use App\Http\Requests\Admin\UpdateCMSPageRequest;

class CMSPageController extends Controller
{
    protected $cms;
    public function __construct(CMSInterface $cms)
    {
        $this->cms = $cms;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->cms->getPaginatedList($request, 4);
        $emptyMessage = "No data found";
        return view('admin.pages.cms.pages', compact('emptyMessage'))
            ->withRows($this->resp->data);
    }

    public function getCreate()
    {
        $data['cms'] = new CMSPage();
        $data['buttonText'] = "Save";
        return view('admin.pages.cms.create', $data);
    }

    public function postStore(StoreCMSPageRequest $request)
    {
        $this->resp = $this->cms->postStore($request);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id)
    {
        $this->resp = $this->cms->getShow($id);
        $buttonText = "Update";
        if (!$this->resp->status) {
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }
        return view('admin.pages.cms.edit', compact('buttonText'))->withCms($this->resp->data);

    }

    public function postUpdate(UpdateCMSPageRequest $request, $id)
    {
        $this->resp = $this->cms->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->cms->delete($id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
    public function postUpdateStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            CMSPage::where('id', $data['page_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'page_id' => $data['page_id']]);
        }
    }
}
