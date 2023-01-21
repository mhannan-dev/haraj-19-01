<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\Contact\ContactInterface;


class ContactController extends Controller
{
    protected $user_query;
    public function __construct(ContactInterface $user_query)
    {
        $this->user_query = $user_query;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->user_query->getPaginatedList($request, 4);
        $emptyMessage = "No data found";
        return view('admin.user_query.index', compact('emptyMessage'))
            ->withRows($this->resp->data);
    }
}
