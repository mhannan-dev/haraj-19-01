<?php
namespace App\Http\Controllers\Admin;
use App\Models\AdType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdTypeStoreRequest;
use App\Http\Requests\Admin\AdTypeUpdateRequest;
use App\Repositories\Admin\AdType\AdTypeInterface;

class AdTypeController extends Controller
{
    protected $ad_type;
    public function __construct(AdTypeInterface $ad_type)
    {
        $this->ad_type = $ad_type;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->ad_type->getPaginatedList($request, 4);
        $emptyMessage = "No data found";
        return view('admin.ad_type.index', compact('emptyMessage'))
            ->withRows($this->resp->data);
    }

    public function getCreate()
    {
        $data['ad_type'] = new AdType();
        $data['buttonText'] = "Save";
        return view('admin.ad_type.create', $data);
    }

    public function postStore(AdTypeStoreRequest $request)
    {
       
        $this->resp = $this->ad_type->postStore($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id)
    {
        $this->resp = $this->ad_type->getShow($id);
        $buttonText = "Update";
        if (!$this->resp->status) {
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }
        return view('admin.ad_type.edit', compact('buttonText'))->withRow($this->resp->data);

    }

    public function postUpdate(AdTypeUpdateRequest $request, $id)
    {
        $this->resp = $this->ad_type->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->ad_type->delete($id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
    public function statusUpdate(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            AdType::where('id', $data['item_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'item_id' => $data['item_id']]);
        }
    }
}
