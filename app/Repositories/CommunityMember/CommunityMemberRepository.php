<?php

namespace App\Repositories\CommunityMember;

use App\Models\CommunityMember;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CommunityMemberRepository extends Repository
{

    /**
     * CommunityMemberRepository constructor.
     * @param CommunityMember $CommunityMember
     */
    public function __construct(CommunityMember $communityMember)
    {
        parent::__construct($communityMember);
    }

    /**
     * @param Request $request
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getPaginatedList(Request $request, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->latest()
            ->paginate($limit);
    }


    public function getOrCreateMember($citizenship)
    {
        $existingMember = $this->model->where('citizenship', $citizenship)->first();
        return $existingMember ?? $this->model->create(['citizenship' => $citizenship]);
    }
}
