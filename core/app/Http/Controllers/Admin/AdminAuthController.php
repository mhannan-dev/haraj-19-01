<?php
namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\LoginRequest;

class AdminAuthController extends Controller
{
    /**
     * the model instance
     * @var User
     */
    protected $user;
    /**
     * The Guard implementation.
     *
     * @var Authenticator
     */
    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @param  Authenticator  $auth
     * @return void
     */

    public function __construct(Guard $auth, User $user)
    {
        $this->user = $user;
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getLogin()
    {
        if (!$this->auth->check()) {
            return view('admin.auth.admin_login');
        } else {
            return redirect('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getLogout()
    {

        Session::flush();
        $this->auth->logout();
        return redirect()->route('getLogin');

    }

    public function postLogin(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = Auth::where(['email' => $email])->where(function ($query) {
            $query->where('user_type', 0);
        })->first();

        if ($this->hasExist($user)) {
            if ($this->auth->attempt(['email' => $email, 'password' => $password, 'user_type' => 0], $request->has('remember'))) {
                if (auth()->user()->is_user == 1) {
                    return redirect('dashboard');
                } else {
                    return back();
                }

            }
        }

        return redirect()->back()->withErrors([
            'email' => 'The credentials you entered did not match our records. Try again?',
        ]);
    }

    private function hasExist($user_array)
    {
        if (!empty($user_array)) return true;
        return false;
    }

}
