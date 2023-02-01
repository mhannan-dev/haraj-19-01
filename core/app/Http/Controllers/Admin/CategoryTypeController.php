<?php
namespace App\Http\Controllers\Admin;
use App\Models\Category;
use Illuminate\Support\Arr;
use App\Models\CategoryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
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
        $data['row'] = new CategoryType();
        $data['buttonText'] = "Save";
        return view('admin.category-type.create', $data);
    }

    public function postStore(Request $request)
    {
        //  dd($request->all());
        // Form Data Validate
        $validator = Validator::make($request->all(),[
            'title'                 => 'required|string|max:255',
            'label'                 => 'nullable|array',
            'label.*'               => 'nullable|string|max:50',
            'input_type'            => 'nullable|array',
            'input_type.*'          => 'nullable|string|max:20',
            'min_char'              => 'nullable|array',
            'min_char.*'            => 'nullable|numeric',
            'max_char'              => 'nullable|array',
            'max_char.*'            => 'nullable|numeric',
            'field_necessity'       => 'nullable|array',
            'field_necessity.*'     => 'nullable|string|max:20',
            'file_extensions'       => 'nullable|array',
            'file_extensions.*'     => 'nullable|string|max:255',
            'file_max_size'         => 'nullable|array',
            'file_max_size.*'       => 'nullable|numeric',
            'select_options'        => 'nullable|array',
            'select_options.*'      => 'nullable|string|max:60',
            'editable'              => 'nullable|array',
            'editable.*'            => 'nullable|numeric',

        ]);
        $validated = $validator->validate();
        $validated['fields'] = decorate_input_fields($validated);
        // dd($validated['fields']);
        $validated = Arr::except($validated,[
            'label',
            'input_type',
            'editable',
            'min_char',
            'max_char',
            'field_necessity',
            'file_extensions',
            'file_max_size',
            'select_options']);
        DB::beginTransaction();
        try {
            // $form_data = json_encode($validated['fields']);
            $c_form = new CategoryType();
            $c_form->title = $request->title;
            $c_form->fields = $validated['fields'];
            $c_form->save();
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return redirect()->route('admin.category.type.index');
        }
        DB::commit();
        return redirect()->route('admin.category.type.index');
    }

    public function getEdit(Request $request, $id)
    {
        $c_form = CategoryType::where('id', $id)->firstOrfail();
        $buttonText = "Update";
        return view('admin.category-type.edit', compact('buttonText'))->withRow($c_form);

    }

    public function postUpdate(Request $request, $id)
    {
        // Form Data Validate
        $validator = Validator::make($request->all(),[
            'title'                 => 'required|string|max:255',
            'label'                 => 'nullable|array',
            'label.*'               => 'nullable|string|max:50',
            'input_type'            => 'nullable|array',
            'input_type.*'          => 'nullable|string|max:20',
            'min_char'              => 'nullable|array',
            'min_char.*'            => 'nullable|numeric',
            'max_char'              => 'nullable|array',
            'max_char.*'            => 'nullable|numeric',
            'field_necessity'       => 'nullable|array',
            'field_necessity.*'     => 'nullable|string|max:20',
            'file_extensions'       => 'nullable|array',
            'file_extensions.*'     => 'nullable|string|max:255',
            'file_max_size'         => 'nullable|array',
            'file_max_size.*'       => 'nullable|numeric',
            'select_options'        => 'nullable|array',
            'select_options.*'      => 'nullable|string|max:60',
            'editable'              => 'nullable|array',
            'editable.*'            => 'nullable|numeric',

        ]);
        $validated = $validator->validate();
        $validated['fields'] = decorate_input_fields($validated);
        $validated = Arr::except($validated,['label','input_type','min_char','editable','max_char','field_necessity','file_extensions','file_max_size','select_options']);
        DB::beginTransaction();
        // dd($validated);
        try {
            $c_form = CategoryType::findOrFail($id);
            $c_form->title = $request->title;
            $c_form->fields = $validated['fields'];
            $c_form->update();
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return redirect()->route('admin.category.type.index')->with('error','Type has been updated successfully !');
        }
        DB::commit();
        return redirect()->route('admin.category.type.index')->with('flashMessageSuccess','Type has been updated successfully !');
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
