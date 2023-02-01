<?php

namespace App\Http\Controllers\Admin;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityStore;

use App\Http\Requests\Admin\CityUpdate;
use App\Repositories\Admin\City\CityInterface;

class CityController extends Controller
{
    protected $city;
    public function __construct(CityInterface $city)
    {
        $this->city = $city;
    }

    public function getIndex(Request $request)
    {

        $this->resp = $this->city->getPaginatedList($request, 4);

        $emptyMessage = "No data found";
        return view('admin.city.index', compact('emptyMessage'))
            ->withRows($this->resp->data);
    }

    public function getCreate()
    {
        $data['category'] = new City();
        $data['buttonText'] = "Save";
        return view('admin.city.create', $data);
    }

    public function postStore(CityStore $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);
        $this->resp = $this->city->postStore($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id)
    {
        $this->resp = $this->city->getShow($id);
        $buttonText = "Update";
        if (!$this->resp->status) {
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }
        return view('admin.city.edit', compact('buttonText'))->withRow($this->resp->data);

    }

    public function postUpdate(CityUpdate $request, $id)
    {
        $request->validate([
            'title' => 'required|string'
        ]);
        $this->resp = $this->city->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->city->delete($id);
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
            City::where('id', $data['item_id'])->update(['status' => $status]);
            return  response()->json(['status' => $status, 'item_id' => $data['item_id']]);
        }
    }
}
