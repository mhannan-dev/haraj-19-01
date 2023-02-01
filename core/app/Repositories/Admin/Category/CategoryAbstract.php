<?php
namespace App\Repositories\Admin\Category;

use App\Models\Category;
use App\Traits\RepoResponse;
use App\Http\Helpers\Generals;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CategoryAbstract implements CategoryInterface
{
    use RepoResponse;

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getPaginatedList($request,$per_page = 20)
    {
        $data = $this->category::get();
        // echo '<pre>';
        // echo '======================<br>';
        // print_r($data);
        // echo '<br>======================<br>';
        // exit();
        return $this->formatResponse(true, '', '', $data);
    }

    // public function getList() {
    //     return DB::table('categories')->get();
    // }


    public function postStore($request)
    {
        DB::beginTransaction();
        try {
            $category = new Category();
            $category->title = $request->title;
            $category->parent_id = $request->parent_id;
            $category->bg_color = $request->bg_color;
            $category->icon = $request->icon;
            $category->category_type_id = $request->category_type;
            $category->wheels = $request->wheels ?? null;
            if ($request->file('image')) {
                $image = $request->file('image');
                $imageName  = time() . '.' . $image->getClientOriginalExtension();
                if (!Storage::disk('public')->exists('category')) {
                    Storage::disk('public')->makeDirectory('category');
                }
                $catImage = Image::make($image)->resize(550, 480)->save(storage_path('category'))->stream("webp", 100);
                Storage::disk('public')->put('category/' . $imageName, $catImage);
            }
            $category->image  = $imageName;
            $category->status = 1;
            // dd($request->all());
            $category->save();
        } catch (\Exception $e) {
            dd($e);
            info($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to create !', 'admin.category.index');
        }

        DB::commit();
        return $this->formatResponse(true, 'Category has been Created successfully !', 'admin.category.index');
    }

    public function postUpdate($request, int $id)
    {
        DB::beginTransaction();
        try {
            $category = $this->category->where('id', $id)->first();
            $category->title = $request->title;
            $category->parent_id = $request->parent_id;
            $category->bg_color = $request->bg_color;
            $category->icon = $request->icon;
            $category->category_type_id = $request->category_type;
            $category->wheels = $request->wheels;
            if (isset($image)) {
                $imageName  = time() . '.' . $image->getClientOriginalExtension();
                if (!Storage::disk('public')->exists('category')) {
                    Storage::disk('public')->makeDirectory('category');
                }
                //Delete existing image
                if (Storage::disk('public')->exists('category/' . $category->image)) {
                    Storage::disk('public')->delete('category/' . $category->image);
                }
                $catImage = Image::make($image)->resize(550, 480)->save(storage_path('category'))->stream("webp", 100);
                Storage::disk('public')->put('category/' . $imageName, $catImage);
            } else {

                $imageName = $category->image;
            }
            $category->image = $imageName;
            $category->update();
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to update!', 'admin.category.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'Category has been updated successfully !', 'admin.category.index');
    }

    public function getShow(int $id)
    {
        $data =  Category::find($id);
        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.category.index', $data);
        }
        return $this->formatResponse(false, 'Did not found data !', 'admin.category.index', null);
    }

    public function delete(int $id)
    {
        DB::begintransaction();
        try {
            DB::table('categories')->where('id', $id)->delete();
            DB::commit();
            echo 'deleted successfully';
        } catch (\Exception $e) {
           info($e);
            DB::rollback();
           return $this->formatResponse(false, 'Unable to delete this action !', 'admin.category.index');
        }
        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.category.index');
    }
}
