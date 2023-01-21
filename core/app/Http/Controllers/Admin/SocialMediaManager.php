<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SocialMediaStore;
use App\Http\Requests\Admin\SocialMediaUpdate;
use App\Repositories\Admin\SocialMedia\SocialMediaInterface;


class SocialMediaManager extends Controller
{
    protected $social_media;
    public function __construct(SocialMediaInterface $social_media)
    {
        $this->social_media = $social_media;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->social_media->getPaginatedList($request, 4);

        $emptyMessage = "No data found";
        return view('admin.social_media.index', compact('emptyMessage'))
            ->withRows($this->resp->data);
    }

    public function getCreate()
    {
        $data['category'] = new SocialMedia();
        $data['buttonText'] = "Save";
        return view('admin.social_media.create', $data);
    }

    public function postStore(SocialMediaStore $request)
    {
        $this->resp = $this->social_media->postStore($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id)
    {
        $this->resp = $this->social_media->getShow($id);
        $buttonText = "Update";
        if (!$this->resp->status) {
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }
        return view('admin.social_media.edit', compact('buttonText'))->withRow($this->resp->data);
    }

    public function postUpdate(SocialMediaUpdate $request, $id)
    {
        $this->resp = $this->social_media->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->social_media->delete($id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
    public function statusChange(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            SocialMedia::where('id', $data['item_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'item_id' => $data['item_id']]);
        }
    }
}
