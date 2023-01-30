<?php
namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\CategoryType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryTypeStoreRequest;
use App\Http\Requests\Admin\CategoryTypeUpdateRequest;
use App\Repositories\Admin\CategoryType\CategoryTypeInterface;


class CategoryTypeController extends Controller
{
    protected $category_type;
    public function __construct(CategoryTypeInterface $category_type)
    {
        $this->category_type = $category_type;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->category_type->getPaginatedList($request, 10);
        $emptyMessage = "No data found";
        return view('admin.category-type.index', compact('emptyMessage'))
            ->withRows($this->resp->data);
    }

    public function getCreate()
    {
        $data['category'] = new CategoryType();
        $data['buttonText'] = "Save";
        return view('admin.category-type.create', $data);
    }

    public function postStore(CategoryTypeStoreRequest $request)
    {
        dd($request->all());
        $this->resp = $this->category_type->postStore($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id)
    {
        $this->resp = $this->category_type->getShow($id);
        $buttonText = "Update";
        if (!$this->resp->status) {
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }
        return view('admin.category-type.edit', compact('buttonText'))->withRow($this->resp->data);

    }

    public function postUpdate(CategoryTypeUpdateRequest $request, $id)
    {
        $this->resp = $this->category_type->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->category_type->delete($id);
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
            CategoryType::where('id', $data['item_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'item_id' => $data['item_id']]);
        }
    }
}
