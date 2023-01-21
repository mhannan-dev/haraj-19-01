<?php
namespace App\Http\Controllers\Admin;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerStoreRequest;
use App\Http\Requests\Admin\BannerUpdateRequest;
use App\Repositories\Admin\Banner\BannerInterface;

class BannerController extends Controller
{
    protected $banner;
    public function __construct(BannerInterface $banner)
    {
        $this->banner = $banner;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->banner->getPaginatedList($request, 4);
        $title = "No data found";
        return view('admin.banner.index', compact('title'))
            ->withRows($this->resp->data);
    }

    public function getCreate()
    {
        $data['category'] = new Banner();
        $data['buttonText'] = "Save";
        return view('admin.banner.create', $data);
    }

    public function postStore(BannerStoreRequest $request)
    {
        $this->resp = $this->banner->postStore($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id)
    {
        $this->resp = $this->banner->getShow($id);
        $buttonText = "Update";
        if (!$this->resp->status) {
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }
        return view('admin.banner.edit', compact('buttonText'))->withRow($this->resp->data);

    }

    public function postUpdate(BannerUpdateRequest $request, $id)
    {
        $this->resp = $this->banner->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->banner->delete($id);
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
            Banner::where('id', $data['category_item_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'category_item_id' => $data['category_item_id']]);
        }
    }
}
