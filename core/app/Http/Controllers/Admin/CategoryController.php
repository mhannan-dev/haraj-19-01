<?php
namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\CategoryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Repositories\Admin\Category\CategoryInterface;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->category->getPaginatedList($request, 10);
        $emptyMessage = "No data found";
        return view('admin.category.index', compact('emptyMessage'))
            ->withRows($this->resp->data);
    }

    public function getCreate()
    {
        $data['category'] = new Category();
        $data['category_type'] = DB::table('category_types')->select('title','status','id')->where('status', '=' , 1)->get();
        $data['buttonText'] = "Save";
        return view('admin.category.create', $data);
    }

    public function postStore(CategoryStoreRequest $request)
    {
        $this->resp = $this->category->postStore($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id)
    {
        $this->resp = $this->category->getShow($id);
        $buttonText = "Update";
        if (!$this->resp->status) {
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }
        return view('admin.category.edit', compact('buttonText'))->withRow($this->resp->data);

    }

    public function postUpdate(CategoryUpdateRequest $request, $id)
    {
        $this->resp = $this->category->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->category->delete($id);
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
            Category::where('id', $data['item_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'item_id' => $data['item_id']]);
        }
    }
    public function append_category_level(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $getCategories = Category::with('subCategories')->where(['parent_id' => 0, 'status' => 1])->get();
            $data['getCategories'] = json_decode(json_encode($getCategories), true);
            return view('admin.category._append', $data);
        }
    }
}
