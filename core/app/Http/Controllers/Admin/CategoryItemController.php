<?php
namespace App\Http\Controllers\Admin;
use App\Models\CategoryItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryItemStore;
use App\Http\Requests\Admin\CategoryItemUpdate;
use App\Repositories\Admin\CategoryItem\CategoryItemInterface;

class CategoryItemController extends Controller
{
    protected $category_item;
    public function __construct(CategoryItemInterface $category_item)
    {
        $this->category_item = $category_item;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->category_item->getPaginatedList($request, 4);
        $emptyMessage = "No data found";
        return view('admin.category_item.index', compact('emptyMessage'))
            ->withRows($this->resp->data);
    }

    public function getCreate()
    {
        $data['category'] = new CategoryItem();
        $data['buttonText'] = "Save";
        return view('admin.category_item.create', $data);
    }

    public function postStore(CategoryItemStore $request)
    {
        $this->resp = $this->category_item->postStore($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id)
    {
        $this->resp = $this->category_item->getShow($id);
        $buttonText = "Update";
        if (!$this->resp->status) {
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }
        return view('admin.category_item.edit', compact('buttonText'))->withRow($this->resp->data);

    }

    public function postUpdate(CategoryItemUpdate $request, $id)
    {
        $this->resp = $this->category_item->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->category_item->delete($id);
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
            CategoryItem::where('id', $data['category_item_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'category_item_id' => $data['category_item_id']]);
        }
    }
}
