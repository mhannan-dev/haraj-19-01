<?php
namespace App\Repositories\Admin\Contact;
use App\Models\City;
use App\Models\UserQuery;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;


class ContactAbstract implements ContactInterface
{
    use RepoResponse;

    protected $user_query;

    public function __construct(UserQuery $user_query)
    {
        $this->user_query = $user_query;
    }

    public function getPaginatedList($request,$per_page = 20)
    {
        $data = $this->user_query::get();
        return $this->formatResponse(true, '', '', $data);
    }

    public function getList() {
        return DB::table('user_queries')->get();
    }
}
