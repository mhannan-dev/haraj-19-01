<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\AdminUserRequest;
use App\Repositories\Admin\Role\RoleInterface;
use App\Repositories\Admin\AdminUser\AdminUserInterface;
use App\Repositories\Admin\UserGroup\UserGroupInterface;


class AdminUserController extends Controller
{
    protected $user;
    protected $role;
    protected $userGroup;

    public function __construct(AdminUserInterface $user, RoleInterface $role, UserGroupInterface $userGroup)
    {
        $this->user = $user;
        $this->role = $role;
        $this->userGroup = $userGroup;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->user->getPaginatedList($request);
        return view('admin.admin-user.index')
            ->withRows($this->resp->data);
    }

    public function getCreate()
    {

        return view('admin.admin-user.create')->withUserGroup($this->userGroup->getList());
        //return view('admin.admin-user.create')->withRole($this->role->getList());
    }

    public function postStore(AdminUserRequest $request)
    {
        $this->resp = $this->user->postStore($request);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id)
    {
        $this->resp = $this->user->getShow($id);

        if (!$this->resp->status) {
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }

        return view('admin.admin-user.edit')->withUser($this->resp->data)->withUserGroup($this->userGroup->getList());
        //return view('admin.admin-user.edit')->withUser($this->resp->data)->withRole($this->role->getList());

    }

    public function putUpdate(AdminUserRequest $request, $id)
    {
        $this->resp = $this->user->postUpdate($request, $id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->user->delete($id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
    public function passwordChange(Request $request, $id)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $rules = [
                'current_password' => 'required',
                'new_password' => 'required',
                'again_new_password' => 'required|string',
            ];
            //Validation message
            $customMessage = [
                'current_password.required' => 'Current password is required',
                'new_password.required' => 'New password is required',
                'again_new_password.required' => 'Password is required'
            ];
            $validator = Validator::make($data, $rules, $customMessage);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            //Check new and confirm password is matching
            if ($data['new_password'] == $data['again_new_password']) {
                DB::table('auths')->where('id', $id)->update(['password' => bcrypt($request->new_password)]);
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                $notify[] = ['success', 'Password updated successfully'];
                return back()->withNotify($notify);
            }
        }
        return view('admin.admin-user.password_change');
    }
}
