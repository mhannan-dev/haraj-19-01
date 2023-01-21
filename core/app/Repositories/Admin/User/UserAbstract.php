<?php
namespace App\Repositories\Admin\User;
use App\Models\User;
use App\Traits\RepoResponse;

class UserAbstract implements UserInterface
{
    use RepoResponse;
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getPaginatedList($request, int $per_page = 20)
    {
        $data = User::withCount('advertisements')->paginate($per_page);
        return $this->formatResponse(true, '', 'admin.users.advertiser', $data);
    }
}
