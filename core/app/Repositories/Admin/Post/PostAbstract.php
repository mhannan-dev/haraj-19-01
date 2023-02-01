<?php

namespace App\Repositories\Admin\Post;
use App\Models\Post;
use App\Models\Permission;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;

class PostAbstract implements PostInterface
{
    use RepoResponse;
    public function getIndex($request)
    {
        $posts = DB::table('posts')->get();
        return $posts;
    }
    public function getList() {
        return DB::table('permission_groups')->pluck('group_name', 'id');
    }

    public function postStore($request)
    {
        DB::beginTransaction();

        try {
            $permission = new Permission();
            $permission->name = $request->permission_slug;
            $permission->display_name = $request->display_name;
            $permission->permission_group_id = $request->permission_group;
            $permission->status = 1;
            $permission->save();
        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to create permission !', 'admin.permission.index');
        }

        DB::commit();

        return $this->formatResponse(true, 'Permission has been created successfully !', 'admin.permission.index');
    }

    public function postUpdate($request, int $id)
    {
        DB::beginTransaction();

        try {
            $permission = $this->permission->where('id', $id)->first();
            $permission->name = $request->permission_slug;
            $permission->display_name = $request->display_name;
            $permission->permission_group_id = $request->permission_group;
            $permission->status = 1;
            $permission->update();

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to update permission !', 'admin.permission.index');
        }

        DB::commit();

        return $this->formatResponse(true, 'Permission has been updated successfully !', 'admin.permission.index');
    }

    public function getShow(int $id)
    {
        $data =  Permission::find($id);

        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.permission.index', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.permission.index', null);
    }

    public function delete(int $id)
    {
        DB::begintransaction();
        try {
            Permission::where('id', $id)->delete();
            DB::commit();
            echo 'deleted successfully';
        } catch (\Exception $e) {
            info($e);

            DB::rollback();

            return $this->formatResponse(false, 'Unable to delete this action !', 'admin.permission.index');
        }

        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.permission.index');
    }

}
