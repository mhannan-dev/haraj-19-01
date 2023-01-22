<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandStoreRequest;
use App\Http\Requests\Admin\BrandUpdateRequest;
use App\Models\Category;
use App\Repositories\Admin\Brand\BrandInterface;

class BrandController extends Controller
{
    protected $brand;
    public function __construct(BrandInterface $brand)
    {
        $this->brand = $brand;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->brand->getPaginatedList($request, 10);
        $emptyMessage = "No data found";
        return view('admin.brand.index', compact('emptyMessage'))
            ->withRows($this->resp->data);
    }

    public function getCreate()
    {
        $data['brand'] = new Brand();
        $data['buttonText'] = "Save";
        $data['categories'] = Category::parent()->active()->get();
        return view('admin.brand.create', $data);
    }

    public function postStore(BrandStoreRequest $request)
    {
        $brandCheck = Brand::where('category_id')->where('title', $request->title)->count();
        if ($brandCheck > 0) {
            return back()->with('error', 'Brand already exist');
        }
        $this->resp = $this->brand->postStore($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id)
    {
        $this->resp = $this->brand->getShow($id);
        // dd($this->resp);

        $buttonText = "Update";
        if (!$this->resp->status) {
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }
        $categories = Category::where('parent_id', '!=' , 0)->where('status', 1)->get();
        return view('admin.brand.edit', compact('buttonText', 'categories'))->withRow($this->resp->data);
    }

    public function postUpdate(BrandUpdateRequest $request, $id)
    {
        $this->resp = $this->brand->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->brand->delete($id);
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
            Brand::where('id', $data['item_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'item_id' => $data['item_id']]);
        }
    }
}
